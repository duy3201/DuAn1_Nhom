<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ChangePassword extends BaseView
{

    public static function render($data = null)
    {

        ?>

        <!-- code giao dien -->
        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-1 col-md-3">
                    <?php if ($data && $data['avatar']): ?>
                        <img src="<?= APP_URL ?>/public/assets/client/img/<?= $data['avatar'] ?>" alt="" width="100%">
                    <?php else: ?>
                        <img src="<?= APP_URL ?>/public/assets/client/img/Old Style (3).png" alt="" width="100%">
                    <?php endif; ?>
                </div>
                <div class="col-md-7">
                    <div class="card card-body">
                        <h4 class="text-center ">Đổi mật khẩu</h4>
                        <form action="/change-password" method="post">
                            <input type="hidden" name="method" value="PUT">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập*</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Nhập tên đăng nhập" value="<?= $data['username'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="old_password">Mật khẩu cũ*</label>
                                <input type="password" name="old_password" id="old_password" class="form-control"
                                    placeholder="Nhập mật khẩu cũ">
                                <span class="text-danger error-message" id="error-old_password"></span>
                            </div>
                            <div class="form-group">
                                <label for="new_password">Mật khẩu mới*</label>
                                <input type="password" name="new_password" id="new_password" class="form-control"
                                    placeholder="Nhập mật khẩu mới">
                                <span class="text-danger error-message" id="error-new_password"></span>
                                <p id="password-strength" class="mt-2 text-warning" style="font-size: 12px;"></p>
                            </div>

                            <div class="form-group">
                                <label for="re_password">Nhập lại mật khẩu mới*</label>
                                <input type="password" name="re_password" id="re_password" class="form-control"
                                    placeholder="Nhập lại mật khẩu mới">
                                <span class="text-danger error-message" id="error-re_password"></span>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                                <button type="submit" class="btn btn-warning">Cập nhật</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const form = document.querySelector('form');
                const newPasswordInput = document.getElementById('new_password');
                const passwordStrengthIndicator = document.getElementById('password-strength');

                // Kiểm tra độ mạnh của mật khẩu
                newPasswordInput.addEventListener('input', () => {
                    const password = newPasswordInput.value.trim();
                    const strength = checkPasswordStrength(password);

                    if (strength === "Weak") {
                        passwordStrengthIndicator.textContent = "Độ mạnh: Yếu (Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt)";
                        passwordStrengthIndicator.style.color = "red";
                    } else if (strength === "Medium") {
                        passwordStrengthIndicator.textContent = "Độ mạnh: Trung bình (Bạn nên sử dụng thêm ký tự đặc biệt để tăng độ mạnh)";
                        passwordStrengthIndicator.style.color = "orange";
                    } else if (strength === "Strong") {
                        passwordStrengthIndicator.textContent = "Độ mạnh: Mạnh";
                        passwordStrengthIndicator.style.color = "green";
                    }
                });

                form.addEventListener('submit', (e) => {
                    // Reset lỗi
                    document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

                    const oldPassword = document.getElementById('old_password').value.trim();
                    const newPassword = document.getElementById('new_password').value.trim();
                    const rePassword = document.getElementById('re_password').value.trim();

                    let hasError = false;

                    // Kiểm tra mật khẩu cũ
                    if (!oldPassword) {
                        document.getElementById('error-old_password').textContent = 'Vui lòng nhập mật khẩu cũ.';
                        hasError = true;
                    }

                    // Kiểm tra mật khẩu mới
                    if (!newPassword) {
                        document.getElementById('error-new_password').textContent = 'Vui lòng nhập mật khẩu mới.';
                        hasError = true;
                    } else {
                        // Kiểm tra độ mạnh của mật khẩu mới
                        const strength = checkPasswordStrength(newPassword);
                        if (strength === "Weak") {
                            document.getElementById('error-new_password').textContent = 'Mật khẩu không đủ mạnh. Hãy chọn mật khẩu mạnh hơn.';
                            hasError = true;
                        }
                    }

                    // Kiểm tra nhập lại mật khẩu mới
                    if (newPassword !== rePassword) {
                        document.getElementById('error-re_password').textContent = 'Mật khẩu xác nhận không khớp.';
                        hasError = true;
                    }

                    // Ngăn form gửi đi nếu có lỗi
                    if (hasError) {
                        e.preventDefault();
                    }
                });

                // Hàm kiểm tra độ mạnh của mật khẩu
                function checkPasswordStrength(password) {
                    const hasUpperCase = /[A-Z]/.test(password);
                    const hasLowerCase = /[a-z]/.test(password);
                    const hasNumbers = /\d/.test(password);
                    const hasSpecialChars = /[@$!%*?&#]/.test(password);
                    const hasMinLength = password.length >= 8;

                    if (!hasMinLength) {
                        return "Weak";
                    } else if (hasUpperCase && hasLowerCase && hasNumbers && hasSpecialChars) {
                        return "Strong";
                    } else {
                        return "Medium";
                    }
                }
            });

        </script>

        <p id="password-strength" style="font-size: 12px;"></p>


        <?php
    }
}
