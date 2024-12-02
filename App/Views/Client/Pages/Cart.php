<?php

namespace App\Views\Client\Pages;

use App\Views\BaseView;
use App\Models\Product;

class Cart extends BaseView
{
    public static function render($data = null)
    {
        // Lấy thông tin giỏ hàng từ cookie
        $cartItems = isset($_COOKIE['carts_detail']) ? json_decode($_COOKIE['carts_detail'], true) : [];
        $total = 0;

        ?>
        <!-- Bắt đầu phần giỏ hàng -->
        <section class="shopping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if (!empty($cartItems)): ?>
                            <div class="cart-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Hình ảnh</th>
                                            <th class="p-name">Tên sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng cộng</th>
                                            <th><i class="ti-close"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cartItems as $productId => $quantity): ?>
                                            <?php
                                            // Lấy thông tin sản phẩm từ database
                                            $productModel = new Product();
                                            $product = $productModel->getOneProductByStatus($productId);

                                            if (!$product) {
                                                // Nếu sản phẩm không tồn tại (hoặc bị xóa), bỏ qua sản phẩm này
                                                continue;
                                            }

                                            $totalItemPrice = $quantity * $product['product_price'];
                                            $total += $totalItemPrice;
                                            ?>
                                            <tr>
                                                <!-- Hình ảnh sản phẩm -->
                                                <td class="cart-pic">
                                                    <img src="/public/assets/admin/img/<?= htmlspecialchars($product['img']); ?>"
                                                        alt="<?= htmlspecialchars($product['name']); ?>"
                                                        style="max-width: 80px; max-height: 80px;">
                                                </td>
                                                <!-- Tên sản phẩm -->
                                                <td class="cart-title">
                                                    <h5><?= htmlspecialchars($product['name']); ?></h5>
                                                </td>
                                                <!-- Giá từng sản phẩm -->
                                                <td class="p-price">
                                                    <?= number_format($product['product_price'], 0, ',', '.') . ' VNĐ'; ?>
                                                </td>
                                                <!-- Số lượng sản phẩm -->
                                                <td class="qua-col">
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input type="number" value="<?= $quantity; ?>" min="1"
                                                                data-product-id="<?= $productId; ?>">
                                                        </div>
                                                    </div>
                                                </td>
                                                <!-- Tổng giá từng dòng -->
                                                <td class="total-price"><?= number_format($totalItemPrice, 0, ',', '.') . ' VNĐ'; ?>
                                                </td>
                                                <!-- Xóa sản phẩm -->
                                                <td class="close-td">
                                                    <a href="/cart/remove/<?= $productId; ?>" class="btn btn-danger btn-sm" title="Xóa">
                                                        <i class="fas fa-trash-alt"></i> <!-- Font Awesome icon -->
                                                    </a>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Tổng giá giỏ hàng -->
                            <div class="row justify-content-end mt-5">
                                <div class="col-lg-4 offset-lg-4">
                                    <div class="proceed-checkout">
                                        <ul>
                                            <li class="subtotal">Tạm tính
                                                <span><?= number_format($total, 0, ',', '.') . ' VNĐ'; ?></span>
                                            </li>
                                            <li class="cart-total">Tổng cộng
                                                <span><?= number_format($total, 0, ',', '.') . ' VNĐ'; ?></span>
                                            </li>
                                        </ul>
                                        <a href="/CheckOut" class="proceed-btn warning">Thanh toán</a>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <p class="text-center">Giỏ hàng của bạn đang trống. <a href="/products">Tiếp tục mua sắm</a></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Kết thúc phần giỏ hàng -->

        <?php
    }
}
?>