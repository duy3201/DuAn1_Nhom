<?php
// sản phẩm theo loại

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category as ComponentsCategory;

class Category extends BaseView
{
    public static function render($data = null)
    {
        ?>
        <section class="product-shop spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                        <div class="filter-widget">
                            <h4 class="fw-title">Danh mục</h4>
                            <?php
                            ComponentsCategory::render($data['categories'] ?? []);
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="product-list"></div>
                        <?php
                        if (isset($data['products']) && is_array($data['products'])) {
                            ?>
                            <div class="row">
                                <?php
                                foreach ($data['products'] as $item) {
                                    ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <?php
                                                if (!empty($item['img'])) {
                                                    echo "<img src='".APP_URL."/public/assets/admin/img/{$item['img']}' alt=''>";
                                                } else {
                                                    echo "<img src='".APP_URL."/public/assets/admin/img/default.jpg' alt='Hình mặc định'>";
                                                }
                                                ?>
                                                <ul>
                                                    <!-- <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li> -->
                                                    <li class="quick-view"><a href="/products/<?= $item['id'] ?>">Xem chi tiết</a></li>
                                                    <!-- <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li> -->
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name"><?= $item['name'] ?></div>
                                                <a href="#"><h5><?= $item['name'] ?></h5></a>
                                             
                                                <div class="price text-warning">
                                                        <?= !empty($item['product_price']) ? number_format($item['product_price'], 0, ',', '.') . ' VNĐ' : 'Liên hệ'; ?>
                                                    </div>
                                            </div> </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        } else {
                            echo "<h3 class='text-center text-danger'>Không có sản phẩm</h3>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
