<?php

namespace App\Controllers\Client;

use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Validations\AuthValidation;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Pages\Contact;

use Google\Service\CloudSearch\EmailAddress;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PostController 
{
    public static function index()
    {
        $post = new Post();
        $data = $post->getAllPost();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Footer::render();
    }

    public static function Contact(){
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $categoriesmenu = $category->getAllCategoryByStatus();

        $product = new Product();
        $products = $product->getAllProductByStatus();

        $data = [
            'products' => $products,
            'categories' => $categories,
            'categoriesmenu' => $categoriesmenu
        ];

        Header::render($data);
        Notification::render();
        NotificationHelper::unset(); 
        Contact::render();
        Footer::render();
    }
    public static function PostContact()
{
    ob_start();

    // Kiểm tra tính hợp lệ của form thông qua AuthValidation
    $is_valid = AuthValidation::contactForm();
    if (!$is_valid) {
        NotificationHelper::error('contact_valid', 'Gửi liên hệ thất bại');
        header('Location: /contact');
        exit();
    }

    // Lấy dữ liệu từ form
    $data = [
        'name' => $_POST['name'],       // Tên khách hàng
        'email' => $_POST['email'],     // Email khách hàng
        'phone' => $_POST['phone'],     // Số điện thoại khách hàng
        'message' => $_POST['message']  // Nội dung liên hệ
    ];

    // Gửi email cho admin
    $sendToAdmin = EmailController::sendEmailToAdmin(
        $data['name'],
        'huynhvuduykg2005@gmail.com', // Thay bằng email admin nhận phản hồi
          $data['message']         // Tên hiển thị của admin
    );

    // Nếu gửi email tới admin thành công, gửi email cảm ơn tới khách hàng
    if ($sendToAdmin) {
        $sendThankYou = EmailController::sendEmail(
            "Cảm ơn bạn đã liên hệ với chúng tôi! Nội dung bạn gửi: {$data['message']}",
            $data['email'],           // Gửi đến email khách hàng
            $data['name']             // Tên khách hàng
        );

        if ($sendThankYou) {
            NotificationHelper::success('contact_success', 'Gửi liên hệ thành công');
        } else {
            NotificationHelper::error('contact_thankyou_failed', 'Gửi liên hệ thành công, nhưng không thể gửi email cảm ơn.');
        }
    } else {
        NotificationHelper::error('contact_admin_failed', 'Không thể gửi email liên hệ tới admin.');
    }

    // Chuyển hướng về trang liên hệ
    header('Location: /contact');
    ob_end_flush();
}

    public static function DetailContact(){
        ob_start();  
        $is_valid = AuthValidation::detailForm();
        if (!$is_valid) {
            NotificationHelper::error('contact_valid', 'Gửi liên hệ thất bại');
            header('Location: /detail');
            exit();
        }
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'message' => $_POST['message'],
        ];
        $phpEmail= EmailController::sendEmail( $data['message'], $data['email'], $data['name']);       
        NotificationHelper::success('contact_success', 'Gửi liên hệ thành công');
        header('Location: /detail');
        ob_end_flush();
    }
    
   
}