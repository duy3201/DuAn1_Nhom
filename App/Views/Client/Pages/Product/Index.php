<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;
use App\Views\Client\Components\ProductIsFeatured;

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
                                                    <img src="<?= APP_URL ?>/public/assets/admin/img/<?= $item['img'] ?>" alt="">
                                                    <ul>
                                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                        <li class="quick-view"><a href="/products/<?= $item['id'] ?>">+ Xem nhanh</a></li>
                                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="pi-text">
                                                    <div class="catagory-name"><?= $item['name'] ?></div>
                                                    <a href="#">
                                                        <h5><?= $item['name'] ?></h5>
                                                    </a>
                                                    <div class="product-price">
                                                        <?= $item['price'] ?> VNĐ
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