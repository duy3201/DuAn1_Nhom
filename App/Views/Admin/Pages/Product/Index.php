<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
{
    $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

    ?>
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">QUẢN LÝ SẢN PHẨM</h4>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="row mb-2">
                                    <div class="col-6">
                                        <h5 class="card-title">Danh sách sản phẩm</h5>
                                    </div>
                                    <div class="col-6">
                                        <form method="get" action="">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Tìm kiếm người dùng" name="search" value="<?= htmlspecialchars($searchQuery) ?>">
                                                <div class="input-group-append">
                                                    <button class="btn btn-warning" type="submit">Tìm kiếm</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php
                            if (count($data)) :
                                // If search query exists, filter the data
                                if ($searchQuery) {
                                    $data = array_filter($data, function($item) use ($searchQuery) {
                                        return stripos($item['name'], $searchQuery) !== false;
                                    });
                                }
                            ?>
                                <div class="table-responsive">
                                    <table id="" class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th class="col-2">Hình ảnh</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Tên biến thể</th>
                                                <th>Loại</th>
                                                <th>Người thêm</th>
                                                <th>Trạng thái</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-white">
                                            <?php foreach ($data as $item) : ?>
                                                <tr>
                                                    <td><?= $item['id'] ?></td>
                                                    <td>
                                                        <img src="<?= APP_URL ?>/public/assets/admin/img/<?= $item['img'] ?>" alt="Hình sản phẩm" class="img-fluid">
                                                    </td>
                                                    <td><?= $item['name'] ?></td>
                                                    <td><?= $item['product_quality'] ?></td>
                                                    <td><?= $item['category_name'] ?></td>
                                                    <td><?= $item['user_name'] ?></td>
                                                    <td><?= ($item['status'] == 1) ? 'Hiển thị' : 'Ẩn' ?></td>
                                                    <td>
                                                        <a href="/admin/products/<?= $item['id'] ?>" class="btn btn-primary">Sửa</a>
                                                        <form action="/admin/products/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Chắc chưa?')">
                                                            <input type="hidden" name="method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            else :
                            ?>
                                <h4 class="text-center text-danger">Không có dữ liệu</h4>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
<?php
}

}
