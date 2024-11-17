<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ResetPassword extends BaseView
{

    public static function render($data = null)
    {

?>
        <!-- code giao dien -->
        <div class="container mt-5">
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <div class="card card-body">
                <h4 class="text-center text-danger">Đặt lại mặt khẩu</h4>
                <form action="/reset-password" method="post">
                    <input type="hidden" name="method" value="PUT">
                    <div class="form-group">
                        <label for="password">Mật khẩu*</label>
                        <input type="password" name="password" id="password" class="form-control mb-3" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <label for="re_password">Nhập lại mật khẩu*</label>
                        <input type="password" name="re_password" id="re_password" class="form-control mb-3" placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input" checked>
                        <label class="form-check-label" for="remember">
                            Ghi nhớ mật khẩu
                        </label>
                    </div>
                    <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                    <button type="submit" class="btn btn-outline-info">Đặt lại mặt khẩu</button>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    }
}
