<?php

namespace App\Views\Admin\Pages\Orders;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Quản Lý Đơn Hàng</h1>

        <!-- Bảng danh sách đơn hàng -->
        <div class="card">
            <div class="card-header bg-warning text-white d-flex justify-content-between">
                    <span> Danh sách đơn hàng</span>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Khách hàng</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $item) : ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['user_name'] ?></td>
                                <td><?= $item['date'] ?></td>
                                <td><?= ($item['status'] == 1) ? '<span class="badge bg-success">Hoàn thành</span>' : '<span class="badge bg-warning">Chưa thanh toán</span>' ?></td>
                                <td class="">
                                    <a class="btn btn-sm btn-primary view-details" href="/admin/orders/<?= $item['id'] ?>" >
                                        Xem chi tiết
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   

<?php
    }
}
?>
