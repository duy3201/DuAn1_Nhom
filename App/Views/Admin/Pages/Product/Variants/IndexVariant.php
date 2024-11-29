<?php

namespace App\Views\Admin\Pages\Product\Variants;

use App\Views\BaseView;

class IndexVariant extends BaseView
{
    public static function render($data = null)
{
    // Check if search query is provided
    $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

    ?>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="row mb-2">
                                    <div class="col-6">
                                        <h5 class="card-title">Danh sách biến thể</h5>
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
                                        return stripos($item['quality'], $searchQuery) !== false || stripos($item['product_name'], $searchQuery) !== false;
                                    });
                                }
                            ?>
                                <div class="table-responsive">
                                    <table id="" class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th class="col-2">Hình ảnh</th>
                                                <th>Tên biến thể</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-white">
                                            <?php foreach ($data as $item) : ?>
                                                <tr>
                                                    <td><?= $item['id'] ?></td>
                                                    <td>
                                                        <img src="<?= APP_URL ?>/public/assets/admin/img/<?= $item['img'] ?>" alt="Hình biến thể" class="img-fluid">
                                                    </td>
                                                    <td><?= $item['quality'] ?></td>
                                                    <td><?= $item['product_name'] ?></td>
                                                    <td><?= $item['price'] ?></td>
                                                    <td>
                                                        <?php echo isset($item['quanlity']) ? $item['quanlity'] : 'Hết hàng'; ?>
                                                    </td>
                                                    <td>
                                                        <a href="/admin/productvariants/<?= $item['id'] ?>" class="btn btn-primary">Sửa</a>
                                                        <form action="/admin/productvariants/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Chắc chưa?')">
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
            <!-- End Page Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
<?php
}

}
