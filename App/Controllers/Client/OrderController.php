<?php

namespace App\Controllers\Client;

use App\Models\OrderModel;
use App\Views\Client\Pages\PaymentFailed;
use App\Views\Client\Pages\ThankYou;

class OrderController
{
    protected $mailer;

    public function __construct()
    {
        // Lấy instance của PostController để tái sử dụng cấu hình
        // $postController = new PostController();
        // $this->mailer = $postController->getMailer(); // Giả sử có method getMailer() trong PostController
    }
    public function create()
    {
        $order_id = $_POST['orderId'];
        $order = new OrderModel();
        $order->createOrder($order_id);

        $vnp_TmnCode = "7EVQO9JL";
        $vnp_HashSecret = "36MUUDG8P2HYF0DQ2ZQPCSNGU7O3BTNH";
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8080/order/thankyou";

        $vnp_TxnRef = $order_id;
        $vnp_OrderInfo = "Thanh toán đơn hàng tại OldStyle";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $_POST['amount'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = $_POST['bankCode'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($hashdata != "") {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                $query .= '&';
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
            }
            $query .= urlencode($key) . "=" . urlencode($value);
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;
        }

        $returnData = array('code' => '00', 'massage' => 'success', 'data' => $vnp_Url);

        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
    public function thankyou()
    {
        // Kiểm tra trạng thái thanh toán từ VNPAY trả về
        $paymentStatus = $_GET['vnp_ResponseCode'] ?? null; // Mã phản hồi từ VNPAY
        if ($paymentStatus === "00") {
            // Thanh toán thành công

            // Xóa cookie giỏ hàng
            if (isset($_COOKIE['carts_detail'])) {
                setcookie('carts_detail', '', time() - 3600, '/');
            }

            // Lấy thông tin khách hàng
            $customerEmail = $_COOKIE['email_user'] ?? null;
            $customerName = $_COOKIE['name_user'] ?? "Khách hàng";
            $orderDetails = $_POST['orderDetails'] ?? "Không có chi tiết";

            // Gửi email xác nhận
            if ($customerEmail) {
                $emailSent = EmailController::sendPaymentConfirmation($customerEmail, $customerName, $orderDetails);
                if (!$emailSent) {
                    error_log("Failed to send payment confirmation email to $customerEmail");
                }
            }

            // Hiển thị trang cảm ơn
            ThankYou::render();
        } else {
            // Thanh toán thất bại
            $this->paymentFailed();
        }
    }

    public function paymentfailed()
    {
        // Hiển thị trang thanh toán thất bại
        PaymentFailed::render();
    }
}
