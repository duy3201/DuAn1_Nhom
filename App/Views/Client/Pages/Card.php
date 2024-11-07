<?php

namespace App\Views\Client\Pages;

use App\Views\BaseView;

class Card extends BaseView
{
    public static function render($data = null)
    {
        $cartItems = [
            ["image" => "vdcs.jpg", "title" => "SHEIN Áo khoác denim dài tay màu xanh ô liu", "price" => 508000, "quantity" => 1],
            ["image" => "vdcs.jpg", "title" => "Product 2", "price" => 600000, "quantity" => 2],
            ["image" => "vdcs.jpg", "title" => "Product 3", "price" => 700000, "quantity" => 1],
        ];
        
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        ?>
        
        <section class="container my-5">
            <h3 class="text-center mb-4 fw-bold">Giỏ Hàng Của Bạn</h3>
        
            <?php if (!empty($cartItems)): ?>
                <div class="row">
                    <!-- Cart Items List -->
                    <div class="col-12 col-lg-8 mb-4">
                        <?php foreach ($cartItems as $item): ?>
                            <div class="d-flex align-items-center p-3 mb-3 bg-light shadow-sm rounded-3">
                                <img src="./public/img/<?php echo $item['image']; ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                
                                <div class="flex-grow-1">
                                    <h5 class="mb-1 fs-6"><?php echo htmlspecialchars($item['title']); ?></h5>
                                    <p class="mb-1 text-warning fw-bold"><?php echo number_format($item['price'], 0, ',', '.') . '₫'; ?></p>
                                    <div class="input-group input-group-sm">
                                        <input type="number" class="form-control text-center" value="<?php echo $item['quantity']; ?>" min="1">
                                    </div>
                                </div>
                                
                                <p class="ms-auto mb-0 text-danger fw-bold"><?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.') . '₫'; ?></p>
                                <button class="btn btn-sm btn-danger ms-3">Xóa</button>
                            </div>
                        <?php endforeach; ?>
                    </div>
        
                    <!-- Summary Section -->
                    <div class="col-12 col-lg-4">
                        <div class="p-4 bg-light shadow-sm rounded-3">
                            <h5 class="mb-3 fw-bold">Tổng cộng</h5>
                            <p class="text-end text-danger fs-5 fw-bold"><?php echo number_format($totalPrice, 0, ',', '.') . '₫'; ?></p>
                            <button class="btn btn-primary w-100 mt-3">Thanh Toán</button>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-center">Giỏ hàng của bạn trống.</p>
            <?php endif; ?>
        </section>
<?php
    }

}
?>