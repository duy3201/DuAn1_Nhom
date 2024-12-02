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

        // Lọc danh sách sản phẩm theo từ khóa tìm kiếm
        $filteredProducts = [];
        if (!empty($searchKeyword)) {
            foreach ($data['products'] as $product) {
                if (stripos($product['name'], $searchKeyword) !== false) {
                    $filteredProducts[] = $product;
                }
            }
        } else {
            $filteredProducts = $data['products'];
        }

        // Lấy thông tin giỏ hàng từ cookie
        $cartModel = new CartModel();
        $cartItems = $cartModel->getAllCartItems();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
            $productId = $_POST['id_product'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'] ?? 1;

            // Thêm sản phẩm vào giỏ hàng (cookie)
            $cartModel->addToCart([
                'id_product' => $productId,
                'quantity' => $quantity,
                'price' => $price,
            ]);

            // Chuyển hướng lại trang sau khi thêm vào giỏ hàng
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }

?>
        <section class="product-shop spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                        <div class="filter-widget">
                            <h4 class="fw-title">Danh mục</h4>
                            <?php Category::render($data['categories']); ?>
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
                                                    <?php if (!empty($item['img'])): ?>
                                                        <img src="/public/assets/admin/img/<?= htmlspecialchars($item['img']); ?>" alt="Product Image">
                                                    <?php else: ?>
                                                        <img src="/public/assets/admin/img/default.jpg" alt="Default Image"> <!-- Thay bằng hình ảnh mặc định -->
                                                    <?php endif; ?>
                                                    <ul>
                                                        <li class="w-icon active">
                                                            <!-- <a href="#"><i class="icon_bag_alt"></i></a> -->
                                                        </li>
                                                        <li class="quick-view">
                                                            <a href="/products/<?= htmlspecialchars($item['id']); ?>"> Xem chi tiết</a>
                                                        </li>
                                                        <li class="w-icon">
                                                            <!-- <a href="#"><i class="fa fa-random"></i></a> -->
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="pi-text">
                                                    <div class="catagory-name"><?= htmlspecialchars($item['name']); ?></div>
                                                    <p><?= htmlspecialchars($item['name']); ?></p>
                                                    <div class="price text-warning"">
                                                        <?= !empty($item['price']) ? number_format($item['price'], 0, ',', '.') . ' VNĐ' : 'Liên hệ'; ?>
                                                    </div>
                                                 
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
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