<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- code giao dien -->
        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-1 col-md-3">
                    <?php
                        if ($data && $data['avatar']):
                    ?>
                    <img src="<?= APP_URL ?>/public/uploads/users/<?= $data['avatar'] ?>" alt="" width="100%" class="border border-primary">
                    <?php
                        else:
                    ?>
                    <img src="<?= APP_URL ?>/public/uploads/users/user.webp" alt="" width="100%" class=" border border-primary">
                    <?php
                        endif;
                    ?>
                </div>
                <div class="col-md-7">
                    <div class="card card-body shadow">
                        <h4 class="text-center text-primary">Tài khoản</h4>
                        <form action="/users/<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="method" value="PUT">
                            <div class="form-group">
                                <label for="username" class="form-label">Tên đăng nhập*</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" value="<?= $data['username'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email*</label>
                                <input type="email" name="email" id="email" class="form-control mb-3" placeholder="Nhập email" value="<?= $data['email'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-label">Họ và tên*</label>
                                <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Nhập họ và tên" value="<?= $data['name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="avatar" class="form-label">Ảnh đại diện</label>
                                <input type="file" name="avatar" id="avatar" class="form-control mb-3">
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
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
