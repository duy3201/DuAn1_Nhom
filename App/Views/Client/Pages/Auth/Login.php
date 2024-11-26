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

                            <!-- Nút Đăng nhập với Google -->
                            <div class="social-login">
                                <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=https://www.googleapis.com/auth/userinfo.email%20https://www.googleapis.com/auth/userinfo.profile&response_type=token&redirect_uri=http://127.0.0.1:8080/&client_id=207158970806-3kme29diqj31cuj2etgqsj06344e4tp1.apps.googleusercontent.com" class="btn btn-google"><i class="fa fa-google"></i> Đăng nhập với Google</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
