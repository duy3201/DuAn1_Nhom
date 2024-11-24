<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Login extends BaseView
{

    public static function render($data = null)
    {

        ?>
      

      <div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Đăng nhập</h2>
                    
                    <!-- Hiển thị lỗi -->
                    <?php if (!empty($data['error'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $data['error'] ?>
                        </div>
                    <?php endif; ?>
                    
                    <form action="/login" method="post">
                        <input type="hidden" name="method" value="POST">
                        <div class="group-input">
                            <label for="username">Tên đăng nhập *</label>
                            <input type="text" name="username" id="username" class="form-control"
                                   placeholder="Nhập tên đăng nhập" value="<?= htmlspecialchars($data['username'] ?? '') ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu *</label>
                            <input type="password" name="password" id="password" class="form-control mb-3"
                                   placeholder="Nhập mật khẩu" required>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input" checked>
                            <label class="form-check-label" for="remember">Ghi nhớ mật khẩu</label>
                        </div>
                        <button type="submit" class="site-btn login-btn">ĐĂNG NHẬP</button>
                    </form>
                    <div class="switch-login">
                        
                        <a href="/forgot-password" class="or-login">Quên mật khẩu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");

    form.addEventListener("submit", (e) => {
        let hasError = false;

        // Reset lỗi cũ
        document.querySelectorAll(".error-message").forEach(el => el.textContent = '');

        if (!usernameInput.value.trim()) {
            displayError(usernameInput, "Vui lòng nhập tên đăng nhập.");
            hasError = true;
        }

        if (!passwordInput.value.trim()) {
            displayError(passwordInput, "Vui lòng nhập mật khẩu.");
            hasError = true;
        }

        if (hasError) {
            e.preventDefault(); // Ngăn gửi form
        }
    });

    function displayError(input, message) {
        const error = document.createElement("span");
        error.className = "text-danger error-message";
        error.textContent = message;
        input.parentNode.appendChild(error);
    }
});

</script>

        <?php
    }
}
