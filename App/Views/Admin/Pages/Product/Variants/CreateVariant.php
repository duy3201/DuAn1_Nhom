<?php

namespace App\Views\Admin\Pages\Product\Variants;

use App\Views\BaseView;

class CreateVariant extends BaseView
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
                        <h4 class="page-title">QUẢN LÝ BIẾN THỂ</h4>
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
                            <form class="form-horizontal" action="/admin/productvariants" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm biến thể</h4>
                                    <input type="hidden" name="method" id="" value="POST">
                                    <div class="form-group">
                                        <label for="label">Tên</label>
                                        <input type="text" class="form-control" id="label" placeholder="Nhập tên biến thể..." name="label" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Hình ảnh</label>
                                        <input type="file" class="form-control" id="img" placeholder="Chọn hình biến thể..." name="img">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Giá</label>
                                        <input type="number" class="form-control" id="price" placeholder="Nhập giá biến thể..." name="price">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_product">Tên sản phẩm*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="id_product" name="id_product" require>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <?php
                                            foreach ($data as $item) :
                                            ?>
                                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="quanlity">Số lượng</label>
                                        <input type="number" class="form-control" id="quanlity" placeholder="Nhập mô tả biến thể..." name="quanlity"></input>
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
            </div>

    <?php
    }
}
