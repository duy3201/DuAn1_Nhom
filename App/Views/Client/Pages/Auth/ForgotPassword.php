<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ForgotPassword  extends BaseView
{

    public static function render($data = null)
    {

?>
        <!-- code giao dien -->
        <div class="container mt-5 ">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-body">
                        <h4 class="text-center text-danger">Lấy lại mật khẩu</h4>
                        <form action="/forgot-password" method="POST" >
                            <input type="hidden" name="method" value="POST">
                            <div class="form-goup">
                                <label for="username">Tên đăng nhập*</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" >
                            </div>
                            <div class="form-goup m-2">
                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email">
                            </div>
                            <button type="reset" class="btn btn-danger">Nhập lại</button>
                            <button type="submit" class="btn btn-warning">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
