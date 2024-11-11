<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Login extends BaseView
{
    public static function render($data = null)
    {
?>


    <!-- Container để căn giữa form -->
      <!-- Register Section Begin -->
      <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Đăng nhập</h2>
                        <form action="#">
                            <div class="group-input">
                                <label for="username">Tên người dùng hoặc địa chỉ email *</label>
                                <input type="text" id="username">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu *</label>
                                <input type="text" id="pass">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Lưu mật khẩu
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Quên mật khẩu </a>
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn">Đăng nhập</button>
                        </form>
                        <div class="switch-login">
                            <a href="/register" class="or-login">Hoặc đăng ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    

<?php
    }
}
?>
