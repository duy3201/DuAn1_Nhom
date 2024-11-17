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
        <div class="container mt-5  ">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form m-3">
                        <h2>Đăng kí</h2>
                        
                        <form action="/register" method="post">
                        <input type="hidden" name="method" value="POST">
                            <div class="group-input mb-3">
                                <label for="username">Tên người dùng *</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" require>
                            </div>
                            <div class="group-input mb-3">
                                <label for="pass">Mật Khẩu*</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="group-input mb-3">
                                <label for="re_password">Nhập lại mật khẩu*</label>
                                <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="group-input mb-5">
                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" class="form-control mb-3" placeholder="Nhập email">
                            </div>
                            <div class="group-input mb-3">
                                <label for="tel">Số điện thoại*</label>
                                <input type="tel" name="tel" id="tel" class="form-control mb-3" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="group-input mb-3">
                                <label for="address">Địa chỉ*</label>
                                <input type="text" name="address" id="address" class="form-control mb-3" placeholder="Nhập địa chỉ">
                            </div>
                            <div class="group-input mb-3">
                                <label for="date_of_birth">Năm sinh*</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control mb-3" placeholder="Nhập date_of_birth">
                            </div>
                            <!-- <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input" checked>
                                <label class="form-check-label" for="remember">
                                    Ghi nhớ mật khẩu
                                </label>
                            </div> -->
                            <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                            <button type="submit" class="site-btn register-btn">Đăng ký</button>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    }
}
