<?php

namespace App\Views\Client;

use App\Helpers\AuthHelper;
use App\Models\Auction;
use App\Views\BaseView;

class DetailAuction extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
?>
        <section class="auction-details mt-5">
            <div class="container">
                <div class="row">
                    <!-- Phần hiển thị hình ảnh sản phẩm -->
                    <div class="col-md-6 mb-4">
                        <div class="product-image">
                            <img src="<?= APP_URL ?>/public/assets/admin/img/<?= $data['auctions']['products_img'] ?>" alt="<?= htmlspecialchars($data['auctions']['products_name']) ?>" class="img-fluid rounded shadow">
                        </div>
                    </div>
                    <!-- Phần hiển thị thông tin chi tiết sản phẩm -->
                    <div class="col-md-6 mb-4">
                        <div class="product-info">
                            <h3 class="mb-3"><?= htmlspecialchars($data['auctions']['products_name']) ?></h3>
                            <p><?= htmlspecialchars($data['auctions']['products_description']) ?></p>

                            <!-- Giá khởi điểm -->
                            <div class="starting-price mb-3">
                                <h4 class="text-success">Giá khởi điểm: <?= number_format($data['auctions']['starting_price'], 0, ',', '.') ?> VNĐ</h4>
                            </div>

                            <!-- Thời gian đấu giá -->
                            <div class="auction-times mb-3">
                                <p><strong>Bắt đầu:</strong> <?= date('d/m/Y H:i', strtotime($data['auctions']['start_time'])) ?></p>
                                <p><strong>Kết thúc:</strong> <?= date('d/m/Y H:i', strtotime($data['auctions']['end_time'])) ?></p>
                            </div>

                            <!-- Form đấu giá -->
                            <form action="/auction/bid" method="POST">
                                <input type="hidden" name="auction_id" value="<?= $data['auctions']['id'] ?>">
                                <input type="hidden" name="user_id" value=""> <!-- Lấy ID người dùng hiện tại -->
                                <div class="form-group">
                                    <label for="bid_price">Nhập giá đấu giá</label>
                                    <input type="number" class="form-control" name="bid_price" min="<?= $data['auctions']['starting_price'] + 1 ?>" placeholder="Nhập số tiền đấu giá" required>
                                </div>
                                <button type="submit" class="btn btn-warning btn-lg">Đấu giá</button>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- Lịch sử đấu giá -->
                <div class="auction-history my-5">
                    <h4>Lịch sử đấu giá</h4>
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>Tên Người Dùng</th>
                                <th>Thời Gian</th>
                                <th>Số Tiền Đấu Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data['auction_history'])): ?>
                                <?php foreach ($data['auction_history'] as $bid): ?>
                                    <tr>
                                        <td><strong><?= htmlspecialchars($bid['user_name']) ?></strong></td>
                                        <td><span class="text-muted"><?= date('d/m/Y H:i', strtotime($bid['bid_time'])) ?></span></td>
                                        <td><strong class="text-success"><?= number_format($bid['bid_price'], 0, ',', '.') ?> VNĐ</strong></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center">Chưa có đấu giá nào</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
<?php
    }
}
?>