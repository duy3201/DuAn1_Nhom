<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ForgotPassword extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- code giao diện -->
        <div class="container mt-5 ">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-body">
                        <h4 class="text-center">Lấy lại mật khẩu</h4>
                        <form id="forgotPasswordForm" action="/forgot-password" method="POST">
                            <input type="hidden" name="method" value="POST">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập*</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập">
                                <small class="text-danger" id="usernameError"></small>
                            </div>
                            <div class="form-group m-2">
                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email">
                                <small class="text-danger" id="emailError"></small>
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
            document.getElementById("forgotPasswordForm").addEventListener("submit", function (e) {
                let hasError = false;

                // Lấy giá trị input
                const username = document.getElementById("username").value.trim();
                const email = document.getElementById("email").value.trim();

                // Clear error messages
                document.getElementById("usernameError").textContent = "";
                document.getElementById("emailError").textContent = "";

                // Kiểm tra tên đăng nhập
                if (username === "") {
                    document.getElementById("usernameError").textContent = "Vui lòng nhập tên đăng nhập.";
                    hasError = true;
                }

                // Kiểm tra email
                if (email === "") {
                    document.getElementById("emailError").textContent = "Vui lòng nhập email.";
                    hasError = true;
                } else if (!/^\S+@\S+\.\S+$/.test(email)) {
                    document.getElementById("emailError").textContent = "Email không hợp lệ.";
                    hasError = true;
                }

                // Ngăn form submit nếu có lỗi
                if (hasError) {
                    e.preventDefault();
                }
            });
        </script>
<?php
    }
}
