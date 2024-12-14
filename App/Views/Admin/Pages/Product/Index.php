<?php

namespace App\Views\Admin\Pages\Product;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Trang hiện tại
        $itemsPerPage = 5; // Số sản phẩm trên mỗi trang
        $totalItems = count($data); // Tổng số sản phẩm
        $totalPages = ceil($totalItems / $itemsPerPage); // Tổng số trang

        // Lọc dữ liệu theo từ khóa tìm kiếm
        if ($searchQuery) {
            $data = array_filter($data, function ($item) use ($searchQuery) {
                return stripos($item['name'], $searchQuery) !== false;
            });
            $totalItems = count($data); // Cập nhật tổng số sản phẩm sau tìm kiếm
            $totalPages = ceil($totalItems / $itemsPerPage); // Cập nhật tổng số trang
        }

        // Lấy dữ liệu cho trang hiện tại
        $startIndex = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($data, $startIndex, $itemsPerPage);

?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ SẢN PHẨM</h4>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
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
                                                <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" name="search" value="<?= htmlspecialchars($searchQuery) ?>">
                                                <div class="input-group-append">
                                                    <button class="btn btn-warning" type="submit">Tìm kiếm</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <?php if ($totalItems > 0) : ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
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
                                            <tbody>
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

                                    <!-- Hiển thị phân trang nâng cao -->
                                    <nav>
                                        <ul class="pagination justify-content-center">
                                            <?php
                                            $paginationRange = 2; // Số trang hiển thị trước và sau trang hiện tại
                                            $startPage = max(1, $currentPage - $paginationRange);
                                            $endPage = min($totalPages, $currentPage + $paginationRange);

                                            // Nút "Trang trước"
                                            if ($currentPage > 1) {
                                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '&search=' . htmlspecialchars($searchQuery) . '">&laquo;</a></li>';
                                            } else {
                                                echo '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
                                            }

                                            // Dấu "..." trước trang đầu tiên hiển thị
                                            if ($startPage > 2) {
                                                echo '<li class="page-item"><a class="page-link" href="?page=1&search=' . htmlspecialchars($searchQuery) . '">1</a></li>';
                                                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                            }

                                            // Các trang trong khoảng hiển thị
                                            for ($i = $startPage; $i <= $endPage; $i++) {
                                                $activeClass = ($i == $currentPage) ? 'active' : '';
                                                echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?page=' . $i . '&search=' . htmlspecialchars($searchQuery) . '">' . $i . '</a></li>';
                                            }

                                            // Dấu "..." sau trang cuối cùng hiển thị
                                            if ($endPage < $totalPages - 1) {
                                                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                                echo '<li class="page-item"><a class="page-link" href="?page=' . $totalPages . '&search=' . htmlspecialchars($searchQuery) . '">' . $totalPages . '</a></li>';
                                            }

                                            // Nút "Trang sau"
                                            if ($currentPage < $totalPages) {
                                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '&search=' . htmlspecialchars($searchQuery) . '">&raquo;</a></li>';
                                            } else {
                                                echo '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
                                            }
                                            ?>
                                        </ul>
                                    </nav>
                                <?php else : ?>
                                    <h4 class="text-center text-danger">Không có dữ liệu</h4>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
