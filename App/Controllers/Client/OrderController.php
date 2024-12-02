<?php
namespace App\Controllers\Client;

use App\Models\OrderModel;

class OrderController
{
    public function create()
    {
        $order_id = $_POST['orderId'];
        
        $vnp_TmnCode = "HYWQZOQG";
        $vnp_HashSecret = "CQ8VSL317Y9BQ90JTZTU8RBLS11N9DBA";
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8080/";

        $vnp_TxnRef = $order_id;
        $vnp_OrderInfo = "Thanh toán đơn hàng tại OldStyle";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $_POST['amount'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
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
}