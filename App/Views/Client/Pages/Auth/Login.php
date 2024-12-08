<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Login extends BaseView
{
    public static function render($data = null)
    {
?>
<body>
<style>
    body {
        background: url(/public/assets/client/img/test5.jpg) no-repeat center center fixed;
        background-size: cover;
        font-family: 'Raleway', sans-serif;
        font-weight: 300;
    }

    header {
        background-color: rgba(255, 255, 255, 1); /* Nền trắng mờ */
        position: relative;
        z-index: 10; /* Đảm bảo header nằm trên hình nền */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Thêm bóng cho header */
    }
</style>


        <div class="register-login-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="login-form">
                            <h2 style="color: #E7AB3C;">Đăng nhập</h2>

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

                            <!-- Nút Đăng nhập với Google -->
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
 </body>
<?php
    }
}
