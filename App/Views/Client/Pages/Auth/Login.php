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
                            <form action="/login" method="post">
                                <input type="hidden" name="method" value="POST">

                                <div class="group-input">
                                    <label for="username">Tên đăng nhập *</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="Nhập tên đăng nhập" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu*</label>
                                    <input type="password" name="password" id="password" class="form-control mb-3"
                                        placeholder="Nhập mật khẩu" required>
                                </div>
                                <div class="form-check">
                                    <form action="/login" method="post"> 
                                <input type="checkbox" name="remember" id="remember" class="form-check-input" checked>
                                <label class="form-check-label" for="remember">
                                    Ghi nhớ mật khẩu
                                </label>
                            </div>
                                <button type="submit" class="site-btn login-btn m-3">Đăng nhập</button>
                            </form>
                            <div class="switch-login">
                                <a href="./register" class="or-login">Hoặc đăng ký</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}
