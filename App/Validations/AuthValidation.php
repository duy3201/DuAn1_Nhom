<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class AuthValidation {

    public static function register(): bool {
        $is_valid = true;

        // Tên đăng nhập
        if (!isset($_POST['username']) || $_POST['username'] === '') {
            NotificationHelper::error('username', 'Không để trống tên đăng nhập');
            $is_valid = false;
        }

        // Mật khẩu
        if (!isset($_POST['password']) || $_POST['password'] === '') {
            NotificationHelper::error('password', 'Không để trống mật khẩu');
            $is_valid = false;
        } else {
            if (strlen($_POST['password']) < 3) {
                NotificationHelper::error('password', 'Mật khẩu không dưới 3 ký tự');
                $is_valid = false;
            }
        }


        if (!isset($_POST['tel']) || $_POST['tel'] === '') {
            NotificationHelper::error('tel', 'Không để trống số điện thoại');
            $is_valid = false;
        } else {
            if (strlen($_POST['tel']) < 10) {
                NotificationHelper::error('tel', 'Số điện không dưới 9 ký tự');
                $is_valid = false;
            }
        }

        // Nhập lại mật khẩu
        if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
            NotificationHelper::error('re_password', 'Không để trống phần nhập lại mật khẩu');
            $is_valid = false;
        } else {
            if ($_POST['password'] != $_POST['re_password']) {
                NotificationHelper::error('re_password', 'Mật khẩu và nhập lại mật khẩu phải giống nhau');
                $is_valid = false;
            }
        }

        // Email
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Không để trống email');
            $is_valid = false;
        } else {
            // Kiểm tra đúng định dạng email
            $emailPattern = '/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }

        if (!isset($_POST['address']) || $_POST['address'] === '') {
            NotificationHelper::error('address', 'Không để trống địa chỉ');
            $is_valid = false;
        } else {
            if ($_POST['address'] != $_POST['address']) {
                NotificationHelper::error('address', 'Địa chỉ không đúng');
                $is_valid = false;
            }
        }

        if (!isset($_POST['date_of_birth']) || $_POST['date_of_birth'] === '') {
            NotificationHelper::error('date_of_birth', 'Không để trống ngày sinh ');
            $is_valid = false;
        } else {
            if (strlen($_POST['date_of_birth']) < 3) {
                NotificationHelper::error('date_of_birth', 'Không đúng ');
                $is_valid = false;
            }
        }

        // Họ và tên
        // if (!isset($_POST['name']) || $_POST['name'] === '') {
        //     NotificationHelper::error('name', 'Không để trống họ và tên');
        //     $is_valid = false;
        // }

        return $is_valid;
    }

    public static function Login(): bool {
        $is_valid = true;

        if (!isset($_POST['username']) || $_POST['username'] === '') {
            NotificationHelper::error('username', 'Không để trống tên đăng nhập');
            $is_valid = false;
        }

        if (!isset($_POST['password']) || $_POST['password'] === '') {
            NotificationHelper::error('password', 'Không để trống mật khẩu');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function edit(): bool {
        $is_valid = true;

        // Email
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Không để trống email');
            $is_valid = false;
        } else {
        // Kiểm tra đúng định dạng email
            $emailPattern = '/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }

        // Họ và tên
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống họ và tên');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function uploadAvatar(){
        if(!file_exists($_FILES['avatar']['tmp_name']) || !is_uploaded_file($_FILES['avatar']['tmp_name'])){
            return false;
        }
        //nơi lưu hình ảnh
        $target_dir='public/assets/admin/img/';

        //Kiểm tra loại file upload có hợp lệ không
        $imageFileType=strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION));

        if($imageFileType != 'jpg' && $imageFileType !='png' && $imageFileType != 'jpeg' && $imageFileType != 'gif' && $imageFileType !='webp'){
            NotificationHelper::error('type_upload', 'Chỉ nhận file ảnh JPG, PNG, JPEG, GIF, WEBP');
            return false;
        }

        //Thay đổi tên file thành dạng năm tháng ngày giờ phút giây
        $nameImage = date('YmdHmi') . '.' . $imageFileType;

        //đường dẫn đầy đủ để di chuyển file
        $target_file = $target_dir.$nameImage;

        if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)){
            NotificationHelper::error('move_upload', 'Không thể tải ảnh vào thư mục đã lưu');
             return false;
        }
       return $nameImage;
    }

    public static function changePassword(): bool {
        $is_valid = true;

        if (!isset($_POST['old_password']) || $_POST['old_password'] === '') {
            NotificationHelper::error('old_password', 'Không để trống mật khẩu cũ');
            $is_valid = false;
        }

        // Mật khẩu mới
        if (!isset($_POST['new_password']) || $_POST['new_password'] === '') {
            NotificationHelper::error('new_password', 'Không để trống mật khẩu mới');
            $is_valid = false;
        } else if (strlen($_POST['new_password']) < 3) {
                NotificationHelper::error('new_password', 'Mật khẩu mới không dưới 3 ký tự');
                $is_valid = false;
            }

        // Nhập lại mật khẩu
        if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
            NotificationHelper::error('re_password', 'Không để trống phần nhập lại mật khẩu');
            $is_valid = false;
        } else if ($_POST['new_password'] != $_POST['re_password']) {
                NotificationHelper::error('re_password', 'Mật khẩu mới và nhập lại mật khẩu mới phải giống nhau');
                $is_valid = false;
            }

        return $is_valid;
    }

    public static function forgotPassword(): bool {
        $is_valid = true;

        // Tên đăng nhập
        if (!isset($_POST['username']) || $_POST['username'] === '') {
            NotificationHelper::error('username', 'Không để trống tên đăng nhập');
            $is_valid = false;
        }

        // Email
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Không để trống email');
            $is_valid = false;
        } else {
            // Kiểm tra đúng định dạng email
            $emailPattern = '/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }

        return $is_valid;
    }

    public static function resetPassword(): bool {
        $is_valid = true;

        // Mật khẩu
        if (!isset($_POST['password']) || $_POST['password'] === '') {
            NotificationHelper::error('password', 'Không để trống mật khẩu');
            $is_valid = false;
        } else {
            if (strlen($_POST['password']) < 3) {
                NotificationHelper::error('password', 'Mật khẩu không dưới 3 ký tự');
                $is_valid = false;
            }
        }

        // Nhập lại mật khẩu
        if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
            NotificationHelper::error('re_password', 'Không để trống phần nhập lại mật khẩu');
            $is_valid = false;
        } else {
            if ($_POST['password'] != $_POST['re_password']) {
                NotificationHelper::error('re_password', 'Mật khẩu và nhập lại mật khẩu phải giống nhau');
                $is_valid = false;
            }
        }

        return $is_valid;
    }
    public static function contactForm(){
        $is_valid = true;
        // Tên
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'vui lòng nhập họ và tên');
            $is_valid = false;
        }
        // Email
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Không để trống Email');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }
        // Số điện thoại
        if (!isset($_POST['phone']) || $_POST['phone'] === '') {
            NotificationHelper::error('phone', 'Không để trống Số điện thoại');
            $is_valid = false;
        } else {
            $phonePattern = "/^(0[0-9]{9,10})$/";
            if (!preg_match($phonePattern, $_POST['phone'])) {
                NotificationHelper::error('phone', 'Số điện thoại không đúng định dạng');
                $is_valid = false;
            }
        }
        return $is_valid;
        
    }
    public static function detailForm(){
        $is_valid = true;
        // Tên
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'vui lòng nhập họ và tên');
            $is_valid = false;
        }
        // Email
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            NotificationHelper::error('email', 'Không để trống Email');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";
            if (!preg_match($emailPattern, $_POST['email'])) {
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }
        return $is_valid;
        
    }
}
