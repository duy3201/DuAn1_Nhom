<?php

namespace App\Views\Admin\Pages\Auction;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">DANH SÁCH ĐẤU GIÁ</h4>
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
                                        <h5 class="card-title">Danh sách sản phẩm đấu giá</h5>
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
                                <?php
                                if (count($data)) :
                                    if ($searchQuery) {
                                        $data = array_filter($data, function ($item) use ($searchQuery) {
                                            return stripos($item['product_name'], $searchQuery) !== false;
                                        });
                                    }
                                ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Giá Khởi điểm</th>
                                                    <th>Thời gian bắt đầu</th>
                                                    <th>Thời gian kết thúc</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Trạng thái</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($data as $item) :
                                                ?>
                                                    <tr>
                                                        <td><?= $item['id'] ?></td>
                                                        <td><?= $item['product_name'] ?></td>
                                                        <td><?= number_format($item['starting_price'], 0, ',', '.') ?> VND</td>
                                                        <td><?= date('d/m/Y H:i', strtotime($item['start_time'])) ?></td>
                                                        <td><?= date('d/m/Y H:i', strtotime($item['end_time'])) ?></td>
                                                        <td>
                                                            <img src="<?= $item['img'] ?>" alt="Hình ảnh sản phẩm" style="width: 80px; height: 80px; object-fit: cover;">
                                                        </td>
                                                        <td><?= $item['status'] == 0 ? 'Đã đóng' : ($item['status'] == 1 ? 'Đã mở' : 'Đã kết thúc') ?></td>
                                                        <td>
                                                            <a href="/admin/auctions/<?= $item['id'] ?>" class="btn btn-primary">Sửa</a>
                                                            <form action="/admin/auctions/delete/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Chắc chắn muốn xóa?')">
                                                                <input type="hidden" name="method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endforeach;
                                                ?>
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
            </div>
        </div>
<?php
    }
}
?>
