<?php
namespace App\Views\Client\Pages\Product;

use App\Models\CartModel;
use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
    public static function render($data = null)
    {
        $searchKeyword = isset($_GET['search']) ? trim($_GET['search']) : '';
        $minPrice = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
        $maxPrice = isset($_GET['max_price']) ? (int)$_GET['max_price'] : PHP_INT_MAX;

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 9;
        $products = isset($data['products']) ? $data['products'] : [];
        $categories = isset($data['categories']) ? $data['categories'] : [];

        $filteredProducts = array_filter($products, function ($product) use ($searchKeyword, $minPrice, $maxPrice) {
            $productPrice = $product['price'];
            return (empty($searchKeyword) || stripos($product['name'], $searchKeyword) !== false)
                && ($productPrice >= $minPrice && $productPrice <= $maxPrice);
        });

        $cartModel = new CartModel();
        $cartItems = $cartModel->getAllCartItems() ?? [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
            $productId = $_POST['id_product'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'] ?? 1;

            $cartModel->addToCart([
                'id_product' => $productId,
                'quantity' => $quantity,
                'price' => $price,
            ]);

            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }

        $totalItems = count($filteredProducts);
        $totalPages = ceil($totalItems / $itemsPerPage);
        ?>
        <section class="product-shop spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                        <div class="filter-widget">
                            <h4 class="fw-title">Danh mục</h4>
                            <?php Category::render($categories); ?>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Giá</h4>
                            <div class="filter-range-wrap">
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount" placeholder="Giá thấp nhất" readonly>
                                        <input type="text" id="maxamount" placeholder="Giá cao nhất" readonly>
                                    </div>
                                </div>
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="0" data-max="500000">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                            </div>
                            <a href="#" id="filter-btn" class="filter-btn">Lọc</a>
                        </div>
                    </div>

                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="product-list">
                            <?php if (count($filteredProducts)) : ?>
                                <div class="row">
                                    <?php foreach ($filteredProducts as $item) : ?>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="product-item">
                                                <div class="pi-pic">
                                                    <img src="/public/assets/admin/img/<?= htmlspecialchars($item['img'] ?? 'default.jpg'); ?>" alt="Product Image">
                                                    <ul>
                                                        <li class="quick-view">
                                                            <a href="/products/<?= htmlspecialchars($item['id']); ?>"> Xem chi tiết</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="pi-text">
                                                    <div class="catagory-name"><?= htmlspecialchars($item['name']); ?></div>
                                                    <div class="price text-warning">
                                                        <?= !empty($item['price']) ? number_format($item['price'], 0, ',', '.') . ' VNĐ' : 'Liên hệ'; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <?php
                                        $paginationRange = 2;
                                        $startPage = max(1, $currentPage - $paginationRange);
                                        $endPage = min($totalPages, $currentPage + $paginationRange);

                                        if ($currentPage > 1) {
                                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '&search=' . htmlspecialchars($searchKeyword) . '">&laquo;</a></li>';
                                        } else {
                                            echo '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
                                        }

                                        if ($startPage > 2) {
                                            echo '<li class="page-item"><a class="page-link" href="?page=1&search=' . htmlspecialchars($searchKeyword) . '">1</a></li>';
                                            echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                        }

                                        for ($i = $startPage; $i <= $endPage; $i++) {
                                            $activeClass = ($i == $currentPage) ? 'active' : '';
                                            echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?page=' . $i . '&search=' . htmlspecialchars($searchKeyword) . '">' . $i . '</a></li>';
                                        }

                                        if ($endPage < $totalPages - 1) {
                                            echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                            echo '<li class="page-item"><a class="page-link" href="?page=' . $totalPages . '&search=' . htmlspecialchars($searchKeyword) . '">' . $totalPages . '</a></li>';
                                        }

                                        if ($currentPage < $totalPages) {
                                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '&search=' . htmlspecialchars($searchKeyword) . '">&raquo;</a></li>';
                                        } else {
                                            echo '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            <?php else : ?>
                                <h3 class="text-center text-danger">Không tìm thấy sản phẩm nào!</h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
?>
