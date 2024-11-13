<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class Products extends BaseView
{
    public static function render($data = null)
    {
?>
        <!-- // $products = [
        //     ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "SHEIN Áo khoác denim", "price" => "508.000₫"],
        //     ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "Product 2", "price" => "600.000₫"],
        //     ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "Product 3", "price" => "700.000₫"],
        //     ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "Product 4", "price" => "800.000₫"],
        //     ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "Product 5", "price" => "900.000₫"],
        //     ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "Product 6", "price" => "1.000.000₫"],
        //     ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "Product 7", "price" => "1.100.000₫"],
        //     ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "Product 8", "price" => "1.200.000₫"],
        // ];
    
        // // Split the array into two rows of 4 items each
        // $chunks = array_chunk($products, 4); -->

        <!-- Product Shop Section Begin -->
        <section class="product-shop spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                        <div class="filter-widget">
                            <h4 class="fw-title">Danh mục</h4>
                            <ul class="filter-catagories">
                                <li><a href="#">Nam</a></li>
                                <li><a href="#">Nữ</a></li>
                                <li><a href="#">Trẻ em</a></li>
                            </ul>
                        </div>
                        <div class="filter-widget">
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
                        </div>
                        <!-- <div class="filter-widget">
                            <h4 class="fw-title">Giá</h4>
                            <div class="filter-range-wrap">
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="33" data-max="98">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                            </div>
                            <a href="#" class="filter-btn">Lọc</a>
                        </div> -->
                        <!-- <div class="filter-widget">
                            <h4 class="fw-title">Màu sắc</h4>
                            <div class="fw-color-choose">
                                <div class="cs-item">
                                    <input type="radio" id="cs-black">
                                    <label class="cs-black" for="cs-black">Đen</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-violet">
                                    <label class="cs-violet" for="cs-violet">Tím</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-blue">
                                    <label class="cs-blue" for="cs-blue">Xanh dương</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-yellow">
                                    <label class="cs-yellow" for="cs-yellow">Vàng</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-red">
                                    <label class="cs-red" for="cs-red">Đỏ</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-green">
                                    <label class="cs-green" for="cs-green">Xanh lá</label>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="filter-widget">
                            <h4 class="fw-title">Kích thước</h4>
                            <div class="fw-size-choose">
                                <div class="sc-item">
                                    <input type="radio" id="s-size">
                                    <label for="s-size">S</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" id="m-size">
                                    <label for="m-size">M</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" id="l-size">
                                    <label for="l-size">L</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" id="xs-size">
                                    <label for="xs-size">XS</label>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="filter-widget">
                            <h4 class="fw-title">Thẻ</h4>
                            <div class="fw-tags">
                                <a href="#">Khăn tắm</a>
                                <a href="#">Giày</a>
                                <a href="#">Áo khoác</a>
                                <a href="#">Váy</a>
                                <a href="#">Quần</a>
                                <a href="#">Mũ nam</a>
                                <a href="#">Ba lô</a>
                            </div>
                        </div> -->
                    </div>

                    <div class="col-lg-9 order-1 order-lg-2">
                        <!-- <div class="product-show-option">
                            <div class="row">
                                <div class="col-lg-7 col-md-7">
                                    <div class="select-option">
                                        <select class="sorting">
                                            <option value="">Sắp xếp theo mặc định</option>
                                        </select>
                                        <select class="p-show">
                                            <option value="">Hiển thị:</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 text-right">
                                    <p>Hiển thị 01-09 trong số 36 sản phẩm</p>
                                </div>
                            </div>
                        </div> -->

                        <div class="product-list">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="/public/assets/client/img/products/product-1.jpg" alt="">
                                            <div class="sale pp-sale">Giảm giá</div>
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a href="/detail">+ Xem nhanh</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">Khăn tắm</div>
                                            <a href="#">
                                                <h5>Quả Dứa Nguyên Chất</h5>
                                            </a>
                                            <div class="product-price">
                                                $14.00
                                                <span>$35.00</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="/public/assets/client/img/products/product-2.jpg" alt="">
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a href="#">+ Xem nhanh</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">Áo khoác</div>
                                            <a href="#">
                                                <h5>Áo len Guangzhou</h5>
                                            </a>
                                            <div class="product-price">
                                                $13.00
                                                <span>$35.00</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="/public/assets/client/img/products/product-3.jpg" alt="">
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a href="#">+ Xem nhanh</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">Giày</div>
                                            <a href="#">
                                                <h5>Áo len Guangzhou</h5>
                                            </a>
                                            <div class="product-price">
                                                $34.00
                                                <span>$35.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="/public/assets/client/img/products/product-4.jpg" alt="">
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a href="#">+ Xem nhanh</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">Áo khoác</div>
                                            <a href="#">
                                                <h5>Khăn len Microfiber</h5>
                                            </a>
                                            <div class="product-price">
                                                $64.00
                                                <span>$35.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="/public/assets/client/img/products/product-5.jpg" alt="">
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a href="#">+ Xem nhanh</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">Giày</div>
                                            <a href="#">
                                                <h5>Mũ sơn cho nam</h5>
                                            </a>
                                            <div class="product-price">
                                                $44.00
                                                <span>$35.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="/public/assets/client/img/products/product-6.jpg" alt="">
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a href="#">+ Xem nhanh</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">Giày</div>
                                            <a href="#">
                                                <h5>Giày Converse</h5>
                                            </a>
                                            <div class="product-price">
                                                $34.00
                                                <span>$35.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="/public/assets/client/img/products/product-7.jpg" alt="">
                                            <div class="sale pp-sale">Giảm giá</div>
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a href="#">+ Xem nhanh</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">Khăn</div>
                                            <a href="#">
                                                <h5>Dứa nguyên chất</h5>
                                            </a>
                                            <div class="product-price">
                                                $64.00
                                                <span>$35.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="/public/assets/client/img/products/product-8.jpg" alt="">
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a href="#">+ Xem nhanh</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">Áo khoác</div>
                                            <a href="#">
                                                <h5>Áo gió 2 lớp</h5>
                                            </a>
                                            <div class="product-price">
                                                $44.00
                                                <span>$35.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="/public/assets/client/img/products/product-9.jpg" alt="">
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a href="#">+ Xem nhanh</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">Giày</div>
                                            <a href="#">
                                                <h5>Giày Converse</h5>
                                            </a>
                                            <div class="product-price">
                                                $34.00
                                                <span>$35.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- <div class="loading-more">
                            <i class="icon_loading"></i>
                            <a href="#">
                                Đang tải thêm
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Shop Section End -->

<?php
    }
}
?>