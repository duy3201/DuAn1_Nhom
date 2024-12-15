<?php

namespace App\Views\Client\Pages\Auth;

use App\Models\CartModel;
use App\Views\BaseView;

class TransactionHistory extends BaseView
{
    public static function render($data = null)
    {
        $searchKeyword = isset($_GET['search']) ? trim($_GET['search']) : '';
        $minPrice = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
        $maxPrice = isset($_GET['max_price']) ? (int)$_GET['max_price'] : PHP_INT_MAX;

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 9;

        // Filter transactions based on search and price filters
        $filteredTransactions = array_filter($data['transactions'], function ($transaction) use ($searchKeyword, $minPrice, $maxPrice) {
            $transactionPrice = $transaction['orders_detail_price'];
            return (empty($searchKeyword) || stripos($transaction['products_name'], $searchKeyword) !== false)
                && ($transactionPrice >= $minPrice && $transactionPrice <= $maxPrice);
        });

        // Pagination logic
        $totalItems = count($filteredTransactions);
        $totalPages = ceil($totalItems / $itemsPerPage);
        $startItem = ($currentPage - 1) * $itemsPerPage;
        $paginatedTransactions = array_slice($filteredTransactions, $startItem, $itemsPerPage);

        ?>
        <?php if (!empty($paginatedTransactions)): ?>
            <div class="table-responsive p-5">
                <table class="table table-bordered table-hover">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Mã giao dịch</th>
                            <th scope="col">Địa chỉ đặt hàng</th>
                            <th scope="col">Người đặt</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Ngân hàng</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($paginatedTransactions as $transaction): ?>
                            <tr>
                                <td><?= htmlspecialchars($transaction['id']) ?></td>
                                <td><?= htmlspecialchars($transaction['sub_address']) ?></td>
                                <td><?= htmlspecialchars($transaction['sub_name']) ?></td>
                                <td><?= htmlspecialchars($transaction['sub_tel']) ?></td>
                                <td><?= htmlspecialchars($transaction['payment_method']) ?></td>
                                <td><?= htmlspecialchars($transaction['products_name']) ?></td>
                                <td><?= number_format($transaction['orders_detail_price'], 0, ',', '.')?> VND</td>
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
            
            <!-- Pagination Controls -->
            <nav>
                <ul class="pagination justify-content-center">
                    <?php
                    // Xác định phạm vi phân trang
                    $paginationRange = 2;
                    $startPage = max(1, $currentPage - $paginationRange);
                    $endPage = min($totalPages, $currentPage + $paginationRange);

                    // Previous Page Link
                    if ($currentPage > 1) {
                        echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '&search=' . htmlspecialchars($searchKeyword) . '&min_price=' . $minPrice . '&max_price=' . $maxPrice . '">&laquo;</a></li>';
                    } else {
                        echo '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
                    }

                    // First Page Link and Ellipsis
                    if ($startPage > 2) {
                        echo '<li class="page-item"><a class="page-link" href="?page=1&search=' . htmlspecialchars($searchKeyword) . '&min_price=' . $minPrice . '&max_price=' . $maxPrice . '">1</a></li>';
                        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                    }

                    // Page Number Links
                    for ($i = $startPage; $i <= $endPage; $i++) {
                        $activeClass = ($i == $currentPage) ? 'active' : '';
                        echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?page=' . $i . '&search=' . htmlspecialchars($searchKeyword) . '&min_price=' . $minPrice . '&max_price=' . $maxPrice . '">' . $i . '</a></li>';
                    }

                    // Ellipsis and Last Page Link
                    if ($endPage < $totalPages - 1) {
                        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                        echo '<li class="page-item"><a class="page-link" href="?page=' . $totalPages . '&search=' . htmlspecialchars($searchKeyword) . '&min_price=' . $minPrice . '&max_price=' . $maxPrice . '">' . $totalPages . '</a></li>';
                    }

                    // Next Page Link
                    if ($currentPage < $totalPages) {
                        echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '&search=' . htmlspecialchars($searchKeyword) . '&min_price=' . $minPrice . '&max_price=' . $maxPrice . '">&raquo;</a></li>';
                    } else {
                        echo '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
                    }
                    ?>
                </ul>
            </nav>

        <?php else: ?>
            <div class="alert alert-info" role="alert">
                Không có giao dịch nào được tìm thấy.
            </div>
        <?php endif; ?>
<?php
    }
}
?>
