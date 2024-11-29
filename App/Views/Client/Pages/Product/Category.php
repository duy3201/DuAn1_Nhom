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
                          ComponentsCategory::render($data['']);
                            ?>
                        </div>
                        <!-- <div class="filter-widget">
                            <h4 class="fw-title">Thương hiệu</h4>
                            <div class="fw-brand-check">
                                <div class="bc-item">
                                    <label for="bc-calvin">
                                        Calvin Klein
                                        <input type="checkbox" id="bc-calvin">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="bc-item">
                                    <label for="bc-diesel">
                                        Diesel
                                        <input type="checkbox" id="bc-diesel">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="bc-item">
                                    <label for="bc-polo">
                                        Polo
                                        <input type="checkbox" id="bc-polo">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="bc-item">
                                    <label for="bc-tommy">
                                        Tommy Hilfiger
                                        <input type="checkbox" id="bc-tommy">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div> -->
                      
                    </div>

                        <div class="col-lg-9 order-1 order-lg-2">

                            <div class="product-list"></div>
       
                    
                    <?php
                    if (isset($data) && isset($data['products']) && $data && $data['products']) :
                    ?>

                        <div class="row">
                                <?php
                            foreach ($data['products'] as $item) :
                            ?>
                                    <div class="col-lg-4 col-sm-6">


                                        <div class="product-item">
                                            <div class="pi-pic">

                                                <img src="  <?= APP_URL ?>/public/assets/admin/img/<?= $item['img'] ?>" alt="">
                                                <!-- <div class="sale pp-sale">Giảm giá</div> -->
                                                <!-- <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div> -->
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
                                                <?= $item['product_price'] ?> VNĐ
                                                <!-- <span>350.000 VNĐ</span> -->
                                            </div>
                                            </div>
                                        </div>


                                    </div>


                                    <?php
                            endforeach;
                            ?>

                                </div>
                    <?php
                    else :
                    ?>
                        <h3 class="text-center text-danger">Không có sản phẩm</h3>

                    <?php
                    endif;
                    ?>
                </div>
            </div>

        </div>



<?php

    }
}
