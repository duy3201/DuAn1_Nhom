<?php


namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Validations\AuthValidation;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Register;
use App\Views\Client\Components\Notification;
use App\Views\Client\Pages\Auth\ChangePassword;
use App\Views\Client\Pages\Auth\Edit;
use App\Views\Client\Pages\Auth\ForgotPassword;
use App\Views\Client\Pages\Auth\ResetPassword;

class AuthController
{

    public static function register()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Register::render();
        Footer::render();
    }

    public static function registerAction()
    {
        // bắt lỗi
        $is_valid = AuthValidation::register();

        if (!$is_valid) {
            NotificationHelper::error('register_valid', 'Đăng ký thất bại');
            header('Location: /register');
            exit();
        }

        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $tel = $_POST['tel'] ?? '0000000000';
        // $address = $_POST['address'];
        // $date_of_birth = $_POST['date_of_birth'] ?? null;
        $name = $_POST['name'] ?? null;
        $name = $_POST['name'] ?? 'Anonymous';
        if (empty($date_of_birth)) {
            die("Ngày sinh không được để trống");
        }
        
        $email = $_POST['email'];


        $data = [
            'username' => $username,
            'password' => $hash_password,
            'tel' => $tel,
            // 'address' => $address,
            // 'date_of_birth' => $date_of_birth,
            'email' => $email,
            'name' => $name,

        ];

        $result = AuthHelper::register($data);
        if ($result) {
            header('Location: /login');
        } else {
            header('Location: /register');
        }
    }

    public static function login()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Login::render();
        Footer::render();
    }

    // // Khi người dùng đăng nhập
    // public static function handleUserLogin()
    // {
    //     // Kiểm tra xem id_user đã có trong cart_detail chưa
    //     $query = "SELECT COUNT(*) as count FROM carts_detail WHERE id_user = ?";
    //     $db = $_SESSION['user'];
    //     $stmt = $db->prepare($query);
    //     $stmt->bind_param("i",$_SESSION['user']['id']);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     $row = $result->fetch_assoc();

    //     // Nếu chưa tồn tại, thêm mới vào cart_detail
    //     if ($row['count'] == 0) {
    //         $insertQuery = "INSERT INTO carts_detail (id_user, created_at) VALUES (?, NOW())";
    //         $insertStmt = $db->prepare($insertQuery);
    //         $insertStmt->bind_param("i", $db['id']);
    //         $insertStmt->execute();
    //     }
    // }

    public static function loginAction()
    {

        $is_valid = AuthValidation::login();

        if (!$is_valid) {
            NotificationHelper::error('login', 'Đăng nhập thất bại');
            header('Location: /login');
            exit();
        }

        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'remember' => isset($_POST['remember'])
        ];

        $result = AuthHelper::login($data);

        if ($result) {
            //nếu đúng sẽ dẫn tới trang chủ
            NotificationHelper::success('login', 'Đăng nhập thành công');
            // $db = $_SESSION['user'];
            // self::handleUserLogin($db['id'], $db);
            header('location: /');
        } else {
            NotificationHelper::error('login', 'Đăng nhập thất bại');
            header('Location: /login');
        }
    }


    public static function logout()
    {
        AuthHelper::logout();
        NotificationHelper::success('logout', 'Đăng xuất thành công');
        header('location: /');
    }





    public static function edit($id)
    {
        $result = AuthHelper::edit($id);

        if (!$result) {
            if (isset($_SESSION['error']['login'])) {
                header('location: /login');
                exit;
            }
            if (isset($_SESSION['error']['user_id'])) {
                $data = $_SESSION['user'];
                $user_id = $data['id'];
                header("location: /user/$user_id");
                exit;
            }
        }

        $data = $_SESSION['user'];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Edit::render($data);
        Footer::render();
    }

    public static function update(int $id)
    {
        $is_valid = AuthValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update_user', 'Cập nhật thông tin không thành công');
            header("location: /users/$id");
            exit;
        }

        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
        ];

        //kiểm tra có upload hình ảnh không, nếu có: kiểm tra xem nó có hợp lệ không
        $is_upload = AuthValidation::uploadAvatar();
        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }

        // gọi helper để upload
        $result = AuthHelper::update($id, $data);

        //kiểm tra kết quả trả về và chuyển hướng
        header("location: /users/$id");
    }

    //hiển thị đổi mật khẩu
    public static function changePassword()
    {
        $is_login = AuthHelper::checkLogin();

        if (!$is_login) {
            NotificationHelper::error('login', 'Vui lòng đăng nhập để đổi mật khẩu');
            header('location: /login');
            exit;
        }

        $data = $_SESSION['user'];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ChangePassword::render($data);
        Footer::render();
    }

    //Thực hiện đổi mật khẩu
    public static function changePasswordAction()
    {
        //validation
        $is_valid = AuthValidation::changePassword();
        if (!$is_valid) {
            NotificationHelper::error('change-password', 'Đổi mật khẩu thất bại');
            header('location: /change-password');
            exit;
        }
        $id = $_SESSION['user']['id'];

        $data = [
            'old_password' => $_POST['old_password'],
            'new_password' => $_POST['new_password'],
        ];

        //gọi AuthHelper

        $result = AuthHelper::changePassword($id, $data);

        header('location: /change-password');
    }



    //hiển thị giao diện form lấy lại mật khẩu
    public static function forgotPassword()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ForgotPassword::render();
        Footer::render();
    }


    //thực hiện chức năng lấy lại mật khẩu
    public static function forgotPasswordAction()
    {
        //validation
        $is_valid = AuthValidation::forgotPassword();

        if (!$is_valid) {
            NotificationHelper::error('forgot_password', 'Lấy lại mật khẩu thất bại');
            header('location: /forgot-password');
            exit;
        }

        $username = $_POST['username'];
        $email = $_POST['email'];

        $data = [
            'username' => $username,

        ];
        //AuthHelper
        $result = AuthHelper::forgotPassword($data);
        if (!$result) {
            NotificationHelper::error('username_exits', 'Không tồn tại tài khoản này');
            header('location: /forgot-password');
            exit;
        }

        if ($result['email'] != $email) {
            NotificationHelper::error('email_exits', 'Email không đúng');
            header('location: /forgot-password');
            exit;
        }

        $_SESSION['reset_password'] = [
            'username' => $username,
            'email' => $email,
        ];

        header('location: /reset-password');
    }

    public static function resetPassword()
    {
        if (!isset($_SESSION['reset_password'])) {
            NotificationHelper::error('reset_password', 'Vui lòng nhập đầy đủ thông tin của form này');
            header('location: /forgot-password');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ResetPassword::render();
        Footer::render();
    }

    public function resetPasswordAction()
    {
        //validation
        $is_valid = AuthValidation::resetPassword();

        if (!$is_valid) {
            NotificationHelper::error('reset_password', 'Đặt lại mật khẩu thất bại');
            header('location: /reset-password');
            exit;
        }

        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        // Sửa khóa từ 'reset-password' thành 'reset_password'
        $data = [
            'username' => $_SESSION['reset_password']['username'], // Sửa ở đây
            'email' => $_SESSION['reset_password']['email'], // Sửa ở đây
            'password' => $hash_password
        ];

        $result = AuthHelper::resetPassword($data);

        if ($result) {
            NotificationHelper::success('reset_password', 'Đặt lại mật khẩu thành công');
            unset($_SESSION['reset_password']);
            header('location: /login');
        } else {
            NotificationHelper::error('reset_password', 'Đặt lại mật khẩu thất bại');
            header('location: /reset-password');
        }
    }
}
