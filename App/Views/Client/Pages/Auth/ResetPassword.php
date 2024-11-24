<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ResetPassword extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- code giao diện -->
        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-body">
                        <h4 class="text-center">Đặt lại mật khẩu</h4>
                        <form id="resetPasswordForm" action="/reset-password" method="post">
                            <input type="hidden" name="method" value="PUT">
                            <div class="form-group">
                                <label for="password">Mật khẩu*</label>
                                <input type="password" name="password" id="password" class="form-control mb-3" placeholder="Nhập mật khẩu">
                                <small class="text-danger" id="passwordError"></small>
                                <p id="password-strength" class="mt-2 text-warning" style="font-size: 12px;"></p>
                            </div>
                            <div class="form-group">
                                <label for="re_password">Nhập lại mật khẩu*</label>
                                <input type="password" name="re_password" id="re_password" class="form-control mb-3" placeholder="Nhập lại mật khẩu">
                                <small class="text-danger" id="rePasswordError"></small>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input" checked>
                                <label class="form-check-label" for="remember">
                                    Ghi nhớ mật khẩu
                                </label>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                                <button type="submit" class="btn btn-warning">Cập nhật</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript kiểm tra mật khẩu mạnh -->
        <script>
            document.getElementById("resetPasswordForm").addEventListener("submit", function (e) {
                let hasError = false;

                // Lấy giá trị input
                const password = document.getElementById("password").value.trim();
                const rePassword = document.getElementById("re_password").value.trim();

                // Xóa thông báo lỗi cũ
                document.getElementById("passwordError").textContent = "";
                document.getElementById("rePasswordError").textContent = "";
                document.getElementById("password-strength").textContent = "";

                // Kiểm tra mật khẩu
                if (password === "") {
                    document.getElementById("passwordError").textContent = "Vui lòng nhập mật khẩu.";
                    hasError = true;
                } else if (password.length < 6) {
                    document.getElementById("passwordError").textContent = "Mật khẩu phải ít nhất 6 ký tự.";
                    hasError = true;
                }

                // Kiểm tra nhập lại mật khẩu
                if (rePassword === "") {
                    document.getElementById("rePasswordError").textContent = "Vui lòng nhập lại mật khẩu.";
                    hasError = true;
                } else if (password !== rePassword) {
                    document.getElementById("rePasswordError").textContent = "Mật khẩu nhập lại không khớp.";
                    hasError = true;
                }

                // Ngăn form submit nếu có lỗi
                if (hasError) {
                    e.preventDefault();
                }
            });

            // Kiểm tra độ mạnh mật khẩu
            document.getElementById("password").addEventListener('input', function () {
                const password = this.value.trim();
                const passwordStrengthIndicator = document.getElementById("password-strength");
                const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;

                // Kiểm tra độ mạnh mật khẩu
                function checkPasswordStrength(password) {
                    if (password.length < 6) {
                        return "Weak";
                    }
                    if (passwordPattern.test(password)) {
                        return "Strong";
                    }
                    return "Medium";
                }

                const strength = checkPasswordStrength(password);

                if (strength === "Weak") {
                    passwordStrengthIndicator.textContent = "Độ mạnh: Yếu (Mật khẩu phải có ít nhất 6 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt)";
                    passwordStrengthIndicator.style.color = "red";
                } else if (strength === "Medium") {
                    passwordStrengthIndicator.textContent = "Độ mạnh: Trung bình (Bạn nên sử dụng thêm ký tự đặc biệt để tăng độ mạnh)";
                    passwordStrengthIndicator.style.color = "orange";
                } else if (strength === "Strong") {
                    passwordStrengthIndicator.textContent = "Độ mạnh: Mạnh";
                    passwordStrengthIndicator.style.color = "green";
                }
            });
        </script>
<?php
    }
}
