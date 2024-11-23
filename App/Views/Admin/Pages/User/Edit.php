<?php

namespace App\Views\Admin\Pages\User;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb ">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ NGƯỜI DÙNG</h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="/admin/users/<?= $data['id'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa người dùng</h4>
                                    <input type="hidden" name="method" id="" value="PUT">

                                    <div align="center">
                                        <img src="<?= APP_URL ?>/public/assets/client/img/<?= $data['avatar'] ?>" alt="" width="300px">
                                    </div>
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control text-dark" id="id" name="id" value="<?= $data['id'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Tên đăng nhập</label>
                                        <input type="text" class="form-control text-dark" id="username" placeholder="Nhập tên đăng nhập..." name="username" value="<?= $data['username'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder="Nhập email người dùng..." name="email" value="<?= $data['email'] ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="tel">Số điện thoại</label>
                                        <input type="number" class="form-control" id="tel" placeholder="Nhập số điện thoại người dùng..." name="tel" value="<?= $data['tel'] ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Họ và tên</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nhập họ tên người dùng..." name="name" value="<?= $data['name'] ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <input type="text" class="form-control" id="password" placeholder="Nhập mật khẩu người dùng..." name="password" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="re_password">Nhập lại mật khẩu</label>
                                        <input type="text" class="form-control" id="re_password" placeholder="Nhập lại mật khẩu..." name="re_password" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="avatar">Ảnh đại diện</label>
                                        <input type="file" class="form-control" id="avatar" placeholder="Chọn ảnh đại diện..." name="avatar" value="<?= $data['avatar'] ?>" require>
                                    </div>
                                    <div class="group-input mb-3">
                                        <label for="address">Địa chỉ*</label>
                                        <input type="text" name="address" id="address" class="form-control mb-3" placeholder="Nhập địa chỉ" value="<?= $data['address'] ?>" require>
                                    </div>
                                    <div class="group-input mb-3">
                                        <label for="date_of_birth">Năm sinh*</label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control mb-3" placeholder="Nhập date_of_birth" value="<?= $data['date_of_birth'] ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Quyền</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="role" name="role" value="<?= $data['role'] ?>" require>
                                            <option value="1" <?= ($data['role'] == 1 ? 'selected' : '') ?>>Quản trị viên</option>
                                            <option value="0" <?= ($data['role'] == 0 ? 'selected' : '') ?>>Khách hàng</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1" <?= ($data['status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                            <option value="0" <?= ($data['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                        <button type="submit" class="btn btn-primary" name="">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

    <?php
    }
}
