<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class TransactionHistory extends BaseView
{
    public static function render($data = null)
    {
?>
       <?php if (!empty($data['transactions'])): ?>
    <div class="table-responsive p-5">
        <table class="table table-bordered table-hover">
            <thead class="table-warning">
                <tr>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Địa chỉ đặt hàng</th>
                    <th scope="col">Người đặt</th>
                    <th scope="col">Ngân hàng</th>
                    <th scope="col">Trạng thái</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['transactions'] as $transaction): ?>
                    <tr>
                        <td><?= htmlspecialchars($transaction['order_id']) ?></td>
                        <td><?= htmlspecialchars($transaction['sub_address']) ?></td>
                        <td><?= htmlspecialchars($transaction['sub_name']) ?></td>

                        <td><?= htmlspecialchars($transaction['payment_method']) ?></td>
                        
                        <td>
                            <span class="badge <?= $transaction['status'] ? 'badge-success' : 'badge-warning' ?>">
                                <?= $transaction['status'] ? 'Đã thanh toán' : 'Chưa thanh toán' ?>
                            </span>
                        </td>
                        <td class=""><!-- Button để mở Modal -->
                            <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#orderDetailModal-<?= $transaction['order_id'] ?>">
                                Xem
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="orderDetailModal-<?= $transaction['order_id'] ?>" tabindex="-1" aria-labelledby="orderDetailModalLabel-<?= $transaction['order_id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderDetailModalLabel-<?= $transaction['order_id'] ?>">Chi Tiết Đơn Hàng #<?= $transaction['order_id'] ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Mã đơn hàng:</strong> <?= htmlspecialchars($transaction['order_id']) ?></p>
                                            <p><strong>Khách hàng:</strong> <?= htmlspecialchars($transaction['sub_name']) ?></p>
                                            <p><strong>Ngày đặt:</strong> <?= htmlspecialchars($transaction['date']) ?></p>
                                            <p><strong>Trạng thái:</strong> <?= $transaction['status'] ? 'Đã thanh toán' : 'Chưa thanh toán' ?></p>

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
                                                        $products = explode(',', $transaction['products_name']);
                                                        $quantities = explode(',', $transaction['quantities']);
                                                        $prices = explode(',', $transaction['prices']);
                                                        for ($i = 0; $i < count($products); $i++): 
                                                    ?>
                                                        <tr>
                                                            <td><?= $i + 1 ?></td>
                                                            <td><?= $products[$i] ?></td>
                                                            <td><?= $quantities[$i] ?></td>
                                                            <td><?= number_format($prices[$i], 0, ',', '.') ?>₫</td>
                                                            <td><?= number_format($quantities[$i] * $prices[$i], 0, ',', '.') ?>₫</td>
                                                        </tr>
                                                    <?php endfor; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="4" class="text-end">Tổng cộng:</th>
                                                        <th><?= number_format($transaction['total_price'], 0, ',', '.') ?>₫</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-info" role="alert">
        Không có giao dịch nào được tìm thấy.
    </div>
<?php endif; ?>

<?php
    }
}
?>
