<?php

namespace App\Views\Admin\Pages\Orders;

use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="container mt-5">
            <h1 class="text-center mb-4">Quản Lý Đơn hàng</h1>

            <div class="card">
                <div class="card-header bg-warning text-white d-flex justify-content-between">
                    <span>Chi tiết Đơn hàng</span>
                    <a onclick="window.history.back();" class="text-white text-decoration-none">Quay lại</a>

                </div>

                <div class="card-body text-white">
                    <p><strong>Mã đơn hàng:</strong> <?= $data['orders']['id'] ?></p>
                    <p><strong>Khách hàng:</strong> <?= $data['orders']['sub_name'] ?></p>
                    <p><strong>Ngày đặt:</strong> <?= $data['orders']['date'] ?></p>
                    <p><strong>Trạng thái:</strong> <?= ($data['orders']['status'] == 1) ? 'Hoàn thành' : 'Chưa thanh toán' ?></p>

                    <!-- Kiểm tra nếu không có chi tiết đơn hàng -->
                    <?php if (empty($data['orders_detail'])) : ?>
                        <p class="text-danger">Không có chi tiết đơn hàng.</p>
                    <?php else : ?>
                        <!-- Bảng sản phẩm -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stt = 1;
                                $total = 0;
                                foreach ($data['orders_detail'] as $item) :
                                    $item_total = $item['orders_detail_price'] * $item['quantity'];
                                    $total += $item_total;
                                ?>
                                    <tr>
                                        <td><?= $stt++ ?></td>
                                        <td><?= $item['products_name'] ?></td>
                                        <td><?= $item['quantity'] ?></td>
                                        <td><?= number_format($item['orders_detail_price'], 0, ',', '.') ?>₫</td>
                                        <td><?= number_format($item_total, 0, ',', '.') ?>₫</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-end">Tổng cộng:</th>
                                    <th><?= number_format($total, 0, ',', '.') ?>₫</th>
                                </tr>
                            </tfoot>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php
    }
}
