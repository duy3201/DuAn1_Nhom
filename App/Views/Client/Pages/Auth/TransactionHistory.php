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
                            <th scope="col">Mã giao dịch</th>
                            <th scope="col">Địa chỉ đặt hàng</th>
                            <th scope="col">Người đặt</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Ngân hàng</th>
                            <th scope="col">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['transactions'] as $transaction): ?>
                            <tr>
                                <td><?= htmlspecialchars($transaction['id']) ?></td>
                                <td><?= htmlspecialchars($transaction['sub_address']) ?></td>
                                <td><?= htmlspecialchars($transaction['sub_name']) ?></td>
                                <td><?= htmlspecialchars($transaction['sub_tel']) ?></td>
                                <td><?= htmlspecialchars($transaction['payment_method']) ?></td>
                                <td>
                                    <span class="badge <?= $transaction['status'] ? 'badge-success' : 'badge-warning' ?>">
                                        <?= $transaction['status'] ? 'Đã thanh toán' : 'Chưa thanh toán' ?>
                                    </span>
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