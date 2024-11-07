<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Register extends BaseView
{
    public static function render($data = null)
    {
?>
        <!--code HTML hiển thị giao diện -->
        <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-6">
            <div class="login-container">
              <h2 class="text-center">Đăng ký</h2>
              <form method="POST" action="" name="register">
                <div class="mb-3">
                  <input type="text" class="form-control mb-4" placeholder="Họ và tên " name="HoTen">
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control mb-4" placeholder="Email" name="Email">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control mb-2" placeholder="Mật khẩu" name="Password">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control mb-4" placeholder="Xác nhận mật khẩu" name="Re_Password">
                  </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary mb-2 ">Đăng ký</button>
                </div>
                <div class="text-center m-2">
                <a class="dropdown-item" href="/login">Bạn chưa có tài khoản? <span class="text-primary">Đăng nhập</span></a>
                </div>
                <div class="social-links mt-4 text-center m-2">
                  <a href="#"><i class="fab fa-facebook-f m-2"></i></a>
                  <a href="#"><i class="fab fa-twitter m-2"></i></a>
                  <a href="#"><i class="fab fa-linkedin-in m-2"></i></a>
                  <a href="#"><i class="fab fa-google m-2"></i></a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<?php
    }
}
?>
