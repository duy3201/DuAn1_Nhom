<?php

namespace App\Views\Admin\Pages\User;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
        // Get search query from the URL
        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
        $itemsPerPage = 5; // Number of users per page
        $totalItems = count($data); // Total number of users
        $totalPages = ceil($totalItems / $itemsPerPage); // Total pages

        // Filter data based on search query
        if ($searchQuery) {
            $data = array_filter($data, function ($item) use ($searchQuery) {
                return stripos($item['username'], $searchQuery) !== false ||
                    stripos($item['name'], $searchQuery) !== false ||
                    stripos($item['email'], $searchQuery) !== false ||
                    stripos($item['tel'], $searchQuery) !== false;
            });
            $totalItems = count($data); // Update total items after search
            $totalPages = ceil($totalItems / $itemsPerPage); // Update total pages
        }

        // Get the data for the current page
        $startIndex = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($data, $startIndex, $itemsPerPage);
?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-6 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ NGƯỜI DÙNG</h4>
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
                                        <h5 class="card-title">Danh sách người dùng</h5>
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
                                ?>
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th class="col-2">Ảnh đại diện</th>
                                                    <th>Tên đăng nhập</th>
                                                    <th>Họ tên</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Ngày sinh</th>
                                                    <th>Quyền</th>
                                                    <th>Trạng thái</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-white">
                                                <?php
                                                foreach ($data as $item) :
                                                ?>
                                                    <tr>
                                                        <td><?= $item['id'] ?></td>
                                                        <td>
                                                            <img src="<?= APP_URL ?>/public/assets/client/img/<?= $item['avatar'] ?>" alt="" width="100px">
                                                        </td>
                                                        <td><?= $item['username'] ?></td>
                                                        <td><?= $item['name'] ?></td>
                                                        <td><?= $item['email'] ?></td>
                                                        <td><?= $item['tel'] ?></td>
                                                        <td><?= $item['address'] ?></td>
                                                        <td><?= $item['date_of_birth'] ?></td>
                                                        <td><?= ($item['role'] == 1) ? 'Quản trị viên' : 'Khách hàng' ?></td>
                                                        <td><?= ($item['status'] == 1) ? 'Hoạt động' : 'Khóa' ?></td>
                                                        <td>
                                                            <a href="/admin/users/<?= $item['id'] ?>" class="btn btn-primary">Sửa</a>
                                                            <form action="/admin/users/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Chắc chưa?')">
                                                                <input type="hidden" name="method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Pagination -->
                                    <nav class="mt-3">
                                        <ul class="pagination justify-content-center">
                                            <?php
                                            $paginationRange = 2; // Number of pages to display before and after the current page
                                            $startPage = max(1, $currentPage - $paginationRange);
                                            $endPage = min($totalPages, $currentPage + $paginationRange);

                                            // Previous button
                                            if ($currentPage > 1) {
                                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '&search=' . htmlspecialchars($searchQuery) . '">&laquo;</a></li>';
                                            } else {
                                                echo '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
                                            }

                                            // First page
                                            if ($startPage > 2) {
                                                echo '<li class="page-item"><a class="page-link" href="?page=1&search=' . htmlspecialchars($searchQuery) . '">1</a></li>';
                                                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                            }

                                            // Pages in range
                                            for ($i = $startPage; $i <= $endPage; $i++) {
                                                $activeClass = ($i == $currentPage) ? 'active' : '';
                                                echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?page=' . $i . '&search=' . htmlspecialchars($searchQuery) . '">' . $i . '</a></li>';
                                            }

                                            // Last page
                                            if ($endPage < $totalPages - 1) {
                                                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                                echo '<li class="page-item"><a class="page-link" href="?page=' . $totalPages . '&search=' . htmlspecialchars($searchQuery) . '">' . $totalPages . '</a></li>';
                                            }

                                            // Next button
                                            if ($currentPage < $totalPages) {
                                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '&search=' . htmlspecialchars($searchQuery) . '">&raquo;</a></li>';
                                            } else {
                                                echo '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
                                            }
                                            ?>
                                        </ul>
                                    </nav>
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
            </div>
        </div>
<?php
    }
}
