<?php

namespace App\Views\Admin\Pages\Post;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
        $categories = $data['categories'] ?? [];
        $users = $data['users'] ?? [];
?>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ BÀI VIẾT</h4>
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
                            <form class="form-horizontal" action="/admin/posts" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm bài viết</h4>
                                    <input type="hidden" name="method" id="" value="POST">
                                    <div class="form-group">
                                        <label for="title">Tiêu đè*</label>
                                        <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề bài viết..." name="title" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Hình ảnh</label>
                                        <input type="file" class="form-control" id="img" placeholder="Chọn hình sản phẩm..." name="img">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Nội dung</label>
                                        <textarea class="form-control" id="content" placeholder="Nhập nội dung bài viết..." name="content"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_categories_post">Loại bài viết*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="id_categories_post" name="id_categories_post" require>
                                        <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php
                                            foreach($categories as $category):
                                            ?>
                                            <option value="<?= $category['id']?>"><?= $category['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>

                                        </select>
                                    <div class="form-group mt-3">
                                        <label for="id_user">Người thêm*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="id_user" name="id_user" require>
                                        <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php
                                            foreach($users as $user):
                                            ?>
                                            <option value="<?= $user['id']?>"><?= $user['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" require>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                        <button type="submit" class="btn btn-primary" name="">Thêm</button>
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
