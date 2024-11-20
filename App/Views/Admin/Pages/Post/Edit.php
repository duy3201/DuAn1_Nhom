<?php

namespace App\Views\Admin\Pages\Post;

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
                            <form class="form-horizontal" action="/admin/posts/<?= $data['post']['id'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa bài viết</h4>
                                    <input type="hidden" name="method" id="" value="PUT">

                                    <div align="center">
                                        <img src="<?= APP_URL ?>/public/assets/admin/img/<?= $data['post']['img'] ?>" alt="" width="300px">
                                    </div>
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control text-dark" id="id" name="id" value="<?= $data['post']['id'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tiêu đề*</label>
                                        <input type="text" class="form-control" id="title" placeholder="Nhập tên loại sản phẩm..." name="title" value="<?= $data['post']['title'] ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Hình ảnh</label>
                                        <input type="file" class="form-control" id="img" placeholder="Chọn hình sản phẩm..." name="img">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Nội dung</label>
                                        <textarea class="form-control" id="content" placeholder="Nhập mô tả sản phẩm..." name="content"><?= $data['post']['content'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_category">Loại*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="id_categories_post" name="id_categories_post" require>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php
                                            foreach ($data['categories_post'] as $item) :
                                            ?>
                                                <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['post']['id_categories_post']) ? 'selected' : '' ?>><?= $item['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_user">Người thêm</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="id_user" name="id_user" require>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php
                                            foreach ($data['user'] as $item) :
                                            ?>
                                                <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['post']['id_user']) ? 'selected' : '' ?>><?= $item['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_user">Người sửa</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="updated_by" name="updated_by" require>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php
                                            foreach ($data['user'] as $item) :
                                            ?>
                                                <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['post']['id_user']) ? 'selected' : '' ?>><?= $item['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status" value="<?= $data['status'] ?>" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1" <?= ($data['post']['status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                            <option value="0" <?= ($data['post']['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>
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
            <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
            <script>
                ClassicEditor
                    .create(document.querySelector('#content'), {
                        simpleUpload: {
                            uploadUrl: '/admin/upload',
                            headers: {
                                'X-CSRF-TOKEN': 'your-csrf-token'
                            }
                        },
                        height: '500px',
                        fontColor: 'black',
                    })
                    .then(editor => {
                        console.log('Editor initialized successfully', editor);
                    })
                    .catch(error => {
                        console.error('Error initializing CKEditor:', error);
                    });
            </script>

    <?php
    }
}
