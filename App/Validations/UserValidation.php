<?php


namespace App\Validations;

use App\Helpers\NotificationHelper;

class UserValidation
{
    public static function create(): bool
    {
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

        // Họ và tên
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống họ và tên');
            $is_valid = false;
        }

        //trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống trạng thái');
            $is_valid = false;
        }

        //Đia chỉ
        if (!isset($_POST['address']) || $_POST['address'] === '') {
            NotificationHelper::error('address', 'Không để trống địa chỉ');
            $is_valid = false;
        }

        //Ngày sinh
        if (!isset($_POST['date_of_birth']) || $_POST['date_of_birth'] === '') {
            NotificationHelper::error('date_of_birth', 'Không để trống ngày sinh');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function edit(): bool
    {
        $is_valid = true;

        // Mật khẩu
        if (isset($_POST['password']) && $_POST['password'] !== '') {
            //kiểm tra độ dài
            if (strlen($_POST['password']) < 3) {
                NotificationHelper::error('password', 'Mật khẩu không dưới 3 ký tự');
                $is_valid = false;
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

        // Họ và tên
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống họ và tên');
            $is_valid = false;
        }


        //trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống trạng thái');
            $is_valid = false;
        }

        //Đia chỉ
        if (!isset($_POST['address']) || $_POST['address'] === '') {
            NotificationHelper::error('address', 'Không để trống địa chỉ');
            $is_valid = false;
        }

        //Ngày sinh
        if (!isset($_POST['date_of_birth']) || $_POST['date_of_birth'] === '') {
            NotificationHelper::error('date_of_birth', 'Không để trống ngày sinh');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function uploadAvatar()
    {
        return AuthValidation::uploadAvatar();
    }
}
