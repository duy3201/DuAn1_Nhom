<?php

namespace App\Views\Admin\Pages\Post;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
        // Get search query from the URL
        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
?>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="row mb-2">
                                    <div class="col-6">
                                        <h5 class="card-title">Danh sách bài viết</h5>
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
                                    // Filter data based on search query
                                    if ($searchQuery) {
                                        $data = array_filter($data, function($item) use ($searchQuery) {
                                            return stripos($item['title'], $searchQuery) !== false || 
                                                   stripos($item['categories_post_name'], $searchQuery) !== false;
                                        });
                                    }
                                ?>
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th class="col-2">Hình ảnh</th>
                                                    <th>Tiêu đề</th>
                                                    <th>Loại</th>
                                                    <th>Trạng thái</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-white">
                                                <?php foreach ($data as $item) : ?>
                                                    <tr>
                                                        <td><?= $item['id'] ?></td>
                                                        <td>
                                                            <img src="<?= APP_URL ?>/public/assets/admin/img/<?= $item['img'] ?>" alt="Hình bài viết" class="img-fluid">
                                                        </td>
                                                        <td><?= $item['title'] ?></td>
                                                        <td><?= $item['categories_post_name'] ?></td>
                                                        <td><?= ($item['status'] == 1) ? 'Hiển thị' : 'Ẩn' ?></td>
                                                        <td>
                                                            <a href="/admin/posts/<?= $item['id'] ?>" class="btn btn-primary">Sửa</a>
                                                            <form action="/admin/posts/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Chắc chưa?')">
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
