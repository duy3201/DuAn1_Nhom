<?php

namespace App\Controllers\Client;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class EmailController
{
    private static function configureMailer()
    {
        $mail = new PHPMailer();

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'huynhvuduykg2005@gmail.com';
            $mail->Password = 'mwld dcxk jwhw cqem';
            $mail->SMTPSecure = 'tls';
            $mail->Port = '587';
            $mail->CharSet = 'UTF-8';

            $mail->setFrom('huynhvuduykg2005@gmail.com', 'OldStyle');

            return $mail;
        } catch (Exception $e) {
            error_log("Mailer Configuration Error: " . $e->getMessage());
            return null;
        }
    }

    public static function sendEmail($message, $to, $name)
    {
        $mail = self::configureMailer();
        if (!$mail) return false;

        try {
            $mail->addAddress($to, $name);
            $mail->addReplyTo('huynhvuduykg2005@gmail.com', 'OldStyle');

            $mail->isHTML(true);
            $mail->Subject = 'Thu phan hoi cua OldStyle Store';
            $mail->Body = "
                <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; background-color: #f7f7f7; padding: 20px; border: 1px solid #ddd; border-radius: 10px;'>
                    <div style='text-align: center; margin-bottom: 20px;'>
                        <img src='http://127.0.0.1:8080/public/img/OldStyleLogo.png' alt='OldStyle Store' style='max-width: 150px;'>
                    </div>
                    <h2 style='color: #333; text-align: center;'>Cảm ơn quý khách đã liên hệ</h2>
                    <p>Kính gửi <strong>$name</strong>,</p>
                    <p>Chúng tôi rất cảm kích khi nhận được phản hồi từ quý khách. Tại <strong>OldStyle Store</strong>, chúng tôi luôn đặt trải nghiệm của khách hàng lên hàng đầu.</p>
                    <p>Phản hồi của quý khách đã được ghi nhận và sẽ giúp chúng tôi cải thiện dịch vụ tốt hơn trong tương lai.</p>

                    <div style='background-color: #fff; padding: 15px; border-radius: 5px; border: 1px solid #ddd; margin: 20px 0;'>
                        <p style='margin: 0;'>Chúng tôi sẽ liên hệ lại sớm nhất nếu cần thêm thông tin từ quý khách.</p>
                    </div>

                    <p style='text-align: center;'>Trân trọng cảm ơn,</p>
                    <p style='text-align: center; font-weight: bold;'>Đội ngũ OldStyle Store</p>
                </div>
            ";


            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            return $mail->send();
        } catch (Exception $e) {
            error_log("Email Sending Error: " . $e->getMessage());
            return false;
        }
    }

    public static function sendEmailToAdmin($name, $email, $message)
    {
        $mail = self::configureMailer();
        if (!$mail) return false;

        try {
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->addAddress('huynhvuduykg2005@gmail.com', 'Admin OldStyle');
            $mail->addReplyTo($email, $name);

            $mail->isHTML(true);
            $mail->Subject = 'Phan hoi tu khach hang: ' . $name;
            $mail->Body = "
                <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; background-color: #f7f7f7; padding: 20px; border: 1px solid #ddd; border-radius: 10px;'>
                    <div style='text-align: center; margin-bottom: 20px;'>
                        <img src='http://127.0.0.1:8080/public/img/OldStyleLogo.png' alt='OldStyle Store' style='max-width: 150px;'>
                    </div>
                    <h2 style='color: #333; text-align: center;'>Phản hồi khách hàng</h2>
                    <p>Kính gửi Admin,</p>
                    <p>Khách hàng <strong>$name</strong> đã gửi phản hồi qua form liên hệ.</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Nội dung:</strong></p>
                    <blockquote style='background-color: #fff; padding: 15px; border-radius: 5px; border: 1px solid #ddd;'>$message</blockquote>

                    <p style='text-align: center;'>Vui lòng kiểm tra và phản hồi sớm nhất.</p>
                    <p style='text-align: center; font-weight: bold;'>Hệ thống OldStyle Store</p>
                </div>
            ";

            $mail->AltBody = "Khách hàng $name đã gửi phản hồi: $message (Email: $email)";

            return $mail->send();
        } catch (Exception $e) {
            error_log("Admin Email Error: " . $e->getMessage());
            return false;
        }
    }

    public static function sendPaymentConfirmation($customerEmail, $customerName, $orderDetails)
    {
        $mail = self::configureMailer();
        if (!$mail) return false;

        try {
            $mail->addAddress($customerEmail, $customerName);
            $mail->addReplyTo('huynhvuduykg2005@gmail.com', 'OldStyle');

            $mail->isHTML(true);
            $mail->Subject = 'Xác nhận thanh toán thành công - OldStyle Store';
            $mail->Body = "
                <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
                    <h2 style='color: #333;'>Xác nhận thanh toán thành công</h2>
                    <p>Kính gửi <strong>$customerName</strong>,</p>
                    <p>Cảm ơn bạn đã mua hàng tại OldStyle Store. Đơn hàng của bạn đã được xác nhận và thanh toán thành công.</p>
                    
                    <div style='background-color: #f8f9fa; padding: 15px; margin: 20px 0; border-radius: 5px;'>
                        <h3 style='color: #333; margin-top: 0;'>Chi tiết đơn hàng:</h3>
                        $orderDetails
                    </div>

                    <p>Nếu bạn có bất kỳ thắc mắc nào về đơn hàng, xin vui lòng liên hệ với chúng tôi qua:</p>
                    <ul>
                        <li>Email: huynhvuduykg2005@gmail.com</li>
                        <li>Hotline: 0943240047</li>
                    </ul>

                    <p>Trân trọng,</p>
                    <p><strong>OldStyle Store</strong></p>
                </div>
            ";
            $mail->AltBody = strip_tags($orderDetails);

            return $mail->send();
        } catch (Exception $e) {
            error_log("Payment Confirmation Email Error: " . $e->getMessage());
            return false;
        }
    }
}
