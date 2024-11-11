<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Register extends BaseView
{
  public static function render($data = null)
  {
    ?>

      <!-- Container để căn giữa form -->
      <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Đăng ký</h2>
                        <form action="#">
                            <div class="group-input">
                                <label for="username">Tên người dùng hoặc địa chỉ email *</label>
                                <input type="text" id="username">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu *</label>
                                <input type="text" id="pass">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Lưu mật khẩu *</label>
                                <input type="text" id="con-pass">
                            </div>
                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="/login" class="or-login">Hoặc Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <?php
  }
}
?>