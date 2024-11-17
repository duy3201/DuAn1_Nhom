<?php

namespace App\Views\Admin\Pages\Product\VariantOptions;

use App\Views\BaseView;

class EditVariant extends BaseView
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
                        <h4 class="page-title">QUẢN LÝ biến thể</h4>
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
                            <form class="form-horizontal" action="/admin/productvariants/<?= $data['productvariant']['id'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa biến thể</h4>
                                    <input type="hidden" name="method" id="" value="PUT">

                                    <div align="center">
                                        <img src="<?= APP_URL ?>/public/assets/admin/img/<?= $data['productvariant']['img'] ?>" alt="" width="300px">
                                    </div>
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control text-dark" id="id" name="id" value="<?= $data['productvariant']['id'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="label">Tên*</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nhập tên loại biến thể..." name="label" value="<?= $data['productvariant']['label'] ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Hình ảnh</label>
                                        <input type="file" class="form-control" id="img" placeholder="Chọn hình biến thể..." name="img">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_product">Loại biến thể*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="id_product" name="id_product" require>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php
                                            foreach ($data['product'] as $item) :
                                            ?>
                                                <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['productvariant']['id_product']) ? 'selected' : '' ?>><?= $item['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Giá</label>
                                        <input type="number" class="form-control" id="price" placeholder="Nhập mô tả biến thể..." name="price" value="<?= $data['productvariant']['price'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="quanlity">Số lượng</label>
                                        <input type="number" class="form-control" id="quanlity" placeholder="Nhập số lượng biến thể..." name="quanlity" value="<?= $data['productvariant']['quanlity'] ?>">
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
