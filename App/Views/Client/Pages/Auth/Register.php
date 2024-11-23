<?php
namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Register extends BaseView
{
    public static function render($data = null)
    {
        
        // Kiểm tra và xử lý form khi người dùng đăng ký
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $re_password = $_POST['re_password'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            // $date_of_birth = $_POST['date_of_birth'];

            // Kiểm tra tên người dùng
            if (empty($username)) {
                $errors['username'] = 'Tên người dùng không được bỏ trống!';
            }

            // Kiểm tra mật khẩu
            if (empty($password)) {
                $errors['password'] = 'Mật khẩu không được bỏ trống!';
            }

            // Kiểm tra nhập lại mật khẩu
            if (empty($re_password) || $re_password !== $password) {
                $errors['re_password'] = 'Mật khẩu không khớp!';
            }

            // Kiểm tra email
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ!';
            }

            // Kiểm tra số điện thoại
            if (empty($tel)) {
                $errors['tel'] = 'Số điện thoại không được bỏ trống!';
            }

            // // Kiểm tra ngày sinh
            // if (empty($date_of_birth)) {
            //     $errors['date_of_birth'] = 'Ngày sinh không được bỏ trống!';
            // }

            // Nếu có lỗi thì lưu thông báo vào session
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
            } else {
                // Xử lý đăng ký nếu không có lỗi (ví dụ lưu vào cơ sở dữ liệu)
                $_SESSION['success'] = 'Đăng ký thành công!';
            }
        }
        ?>

        <div class="register-login-section spad">
            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                    <div class="card shadow-lg border-0">
                        <div class="register-form m-3">
                            <h2>Đăng ký</h2>

                            <form action="/register" method="post" onsubmit="return validateForm()">

                                <input type="hidden" name="method" value="POST">
                                
                                <!-- Tên người dùng -->
                                <div class="group-input mb-3">
                                    <label for="username">Tên người dùng *</label>
                                    <input type="text" name="username" id="username" class="form-control <?php echo isset($_SESSION['errors']['username']) ? 'border-danger' : ''; ?>" placeholder="Nhập tên đăng nhập" value="<?= $_POST['username'] ?? '' ?>">
                                    <span style="display: <?= isset($_SESSION['errors']['username']) ? 'block' : 'none'; ?>" class="text-danger"><?= $_SESSION['errors']['username'] ?? ''; ?></span>
                                </div>

                                <div class="group-input mb-3">
                                    <label for="tel">Số điện thoại *</label>
                                    <input type="tel" name="tel" id="tel" class="form-control mb-3 <?php echo isset($_SESSION['errors']['tel']) ? 'border-danger' : ''; ?>" placeholder="Nhập số điện thoại" value="<?= $_POST['tel'] ?? '' ?>">
                                    <span style="display: <?= isset($_SESSION['errors']['tel']) ? 'block' : 'none'; ?>" class="text-danger"><?= $_SESSION['errors']['tel'] ?? ''; ?></span>
                                </div>

                                <!-- Mật khẩu -->
                                <div class="group-input mb-3">
                                    <label for="password">Mật khẩu *</label>
                                    <input type="password" name="password" id="password" class="form-control <?php echo isset($_SESSION['errors']['password']) ? 'border-danger' : ''; ?>" placeholder="Nhập mật khẩu">
                                    <span style="display: <?= isset($_SESSION['errors']['password']) ? 'block' : 'none'; ?>" class="text-danger"><?= $_SESSION['errors']['password'] ?? ''; ?></span>
                                </div>

                                <!-- Nhập lại mật khẩu -->
                                <div class="group-input mb-3">
                                    <label for="re_password">Nhập lại mật khẩu *</label>
                                    <input type="password" name="re_password" id="re_password" class="form-control <?php echo isset($_SESSION['errors']['re_password']) ? 'border-danger' : ''; ?>" placeholder="Nhập lại mật khẩu">
                                    <span style="display: <?= isset($_SESSION['errors']['re_password']) ? 'block' : 'none'; ?>" class="text-danger"><?= $_SESSION['errors']['re_password'] ?? ''; ?></span>
                                </div>

                                <!-- Email -->
                                <div class="group-input mb-3">
                                    <label for="email">Email *</label>
                                    <input type="email" name="email" id="email" class="form-control mb-3 <?php echo isset($_SESSION['errors']['email']) ? 'border-danger' : ''; ?>" placeholder="Nhập email" value="<?= $_POST['email'] ?? '' ?>">
                                    <span style="display: <?= isset($_SESSION['errors']['email']) ? 'block' : 'none'; ?>" class="text-danger"><?= $_SESSION['errors']['email'] ?? ''; ?></span>
                                </div>

                             
                              
                                


                                <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                                <button type="submit" class="site-btn register-btn">Đăng ký</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
    function validateForm() {
        let errors = {};
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();
        const rePassword = document.getElementById('re_password').value.trim();
        const email = document.getElementById('email').value.trim();
        const tel = document.getElementById('tel').value.trim();

        // Kiểm tra tên người dùng
        if (!username) {
            errors.username = "Tên người dùng không được bỏ trống!";
        }

        // Kiểm tra mật khẩu
        if (!password) {
            errors.password = "Mật khẩu không được bỏ trống!";
        } else if (password.length < 3) {
            errors.password = "Mật khẩu phải chứa ít nhất 6 ký tự!";
        }

        // Kiểm tra nhập lại mật khẩu
        if (!rePassword || rePassword !== password) {
            errors.re_password = "Mật khẩu không khớp!";
        }

        // Kiểm tra email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email || !emailRegex.test(email)) {
            errors.email = "Email không hợp lệ!";
        }

        // Kiểm tra số điện thoại
        const telRegex = /^[0-9]{10,15}$/;
        if (!tel || !telRegex.test(tel)) {
            errors.tel = "Số điện thoại phải chứa 10-15 chữ số!";
        }

        // Hiển thị lỗi
        const errorFields = Object.keys(errors);
        document.querySelectorAll('.text-danger').forEach(el => el.style.display = 'none');
        document.querySelectorAll('.form-control').forEach(el => el.classList.remove('border-danger'));

        if (errorFields.length > 0) {
            errorFields.forEach(field => {
                const errorSpan = document.querySelector(`#${field} + .text-danger`);
                const inputField = document.getElementById(field);

                if (errorSpan) {
                    errorSpan.textContent = errors[field];
                    errorSpan.style.display = 'block';
                }
                if (inputField) {
                    inputField.classList.add('border-danger');
                }
            });
            return false; // Ngăn form gửi đi nếu có lỗi
        }

        return true; // Cho phép gửi form nếu không có lỗi
    }
</script>

        <?php
        // Xóa thông báo lỗi sau khi hiển thị
        unset($_SESSION['errors']);
    }
}
?>
