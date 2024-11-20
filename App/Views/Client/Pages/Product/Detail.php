<?php

namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Detail extends BaseView
{
    public static function render($data = null)
    {
        // $is_login = AuthHelper::checkLogin();
        // var_dump($_SESSION);
?>


        <section class="product-shop spad page-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="filter-widget">
                            <h4 class="fw-title">Danh mục</h4>
                            <ul class="filter-catagories">
                            <?php
                            Category::render($data['categories']);
                            ?>
                            </ul>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Chất lượng</h4>
                            <div class="fw-brand-check">
                                <div class="bc-item">
                                    <label for="bc-calvin">
                                        New Like
                                        <input type="checkbox" id="bc-calvin">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="bc-item">
                                    <label for="bc-diesel">
                                        Good
                                        <input type="checkbox" id="bc-diesel">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="bc-item">
                                    <label for="bc-polo">
                                        Acceptable
                                        <input type="checkbox" id="bc-polo">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-pic-zoom">
                              
                                    <img class="product-big-img" src="<?= APP_URL ?>/public/assets/admin/img/<?= $data['products']['img'] ?>" alt="">
                                    <div class="zoom-icon">
                                        <i class="fa fa-search-plus"></i>
                                    </div>
                                </div>
                                <div class="product-thumbs">
                                    <div class="product-thumbs-track ps-slider owl-carousel">
                                        <div class="pt active" data-imgbigurl="/public/assets/admin/img/product-1.jpg"><img
                                                src="<?= APP_URL ?>/public/assets/admin/img/<?= $data['products']['img'] ?>" alt=""></div>
                                        <div class="pt" data-imgbigurl="/public/assets/admin/img/product-1.jpg"><img
                                                src="<?= APP_URL ?>/public/assets/admin/img/<?= $data['products']['img'] ?>" alt=""></div>
                                        <div class="pt" data-imgbigurl="/public/assets/admin/img/product-1.jpg"><img
                                                src="<?= APP_URL ?>/public/assets/admin/img/<?= $data['products']['img'] ?>" alt=""></div>
                                        <div class="pt" data-imgbigurl="/public/assets/admin/img/product-1.jpg"><img
                                                src="<?= APP_URL ?>/public/assets/admin/img/<?= $data['products']['img'] ?>" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-details">
                                    <div class="pd-title">
                                        <!-- <span>oranges</span> -->
                                        <h3><?= $data['products']['name'] ?></h3>
                                        <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                    </div>
                                    <div class="pd-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span>(5)</span>
                                    </div>
                                    <div class="pd-desc">
                                        <p><?= $data['products']['description'] ?></p>
                                        <h4><?= $data['products']['product_price'] ?> VNĐ</h4>
                                       
                                    </div>
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                        <a href="#" class="primary-btn pd-cart">Thêm giỏ hàng</a>
                                    </div>
                                    <ul class="pd-tags">
                                        <li><span>LOẠI: </span><?= $data['products']['category_name'] ?></li>
                                    </ul>
                                    <div class="pd-share">
                                        <div class="p-code">Mã : <?= $data['products']['id'] ?></div>
                                        <div class="pd-social">
                                            <a href="#"><i class="ti-facebook"></i></a>
                                            <a href="#"><i class="ti-twitter-alt"></i></a>
                                            <a href="#"><i class="ti-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab">
                            <div class="tab-item">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#tab-1" role="tab">Mô tả</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab-2" role="tab">Chi tiết</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab-3" role="tab">Đánh giá của khách hàng (02)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-item-content">
                                <div class="tab-content">
                                    <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                        <div class="product-content">
                                            <div class="row">
                                                <div class="col-lg-7">
                                                   
                                                    <p><?= $data['products']['description'] ?></p>
                                                </div>
                                                <div class="col-lg-5">
                                                    <img src="img/product-single/tab-desc.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                        <div class="specification-table">
                                            <table>
                                                <tr>
                                                    <td class="p-catagory">Đánh giá của khách hàng</td>
                                                    <td>
                                                        <div class="pd-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <span>(5)</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Giá</td>
                                                    <td>
                                                        <div class="p-price">495.000.VNĐ</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Thêm Giỏ Hàng</td>
                                                    <td>
                                                        <div class="cart-add">+ Thêm giỏ hàng</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">sẵn có</td>
                                                    <td>
                                                        <div class="p-stock">22 trong kho</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Cân nặng</td>
                                                    <td>
                                                        <div class="p-weight">1,3kg</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Kích thước</td>
                                                    <td>
                                                        <div class="p-size">Xxl</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Màu</td>
                                                    <td><span class="cs-color"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Mã</td>
                                                    <td>
                                                        <div class="p-code">00012</div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                        <div class="customer-review-option">
                                            <h4>2 Comments</h4>
                                            <div class="comment-option">
                                                <div class="co-item">
                                                    <div class="avatar-pic">
                                                        <img src="img/product-single/avatar-1.png" alt="">
                                                    </div>
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h5>Trung Khoa <span>27 tháng11 năm 2024</span></h5>
                                                        <div class="at-reply">Tuyệt !</div>
                                                    </div>
                                                </div>
                                                <div class="co-item">
                                                    <div class="avatar-pic">
                                                        <img src="img/product-single/avatar-2.png" alt="">
                                                    </div>
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h5>Trung Khoa <span>27 tháng11 năm 2024</span></h5>
                                                        <div class="at-reply">Tuyệt !</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="personal-rating">
                                                <h6>Tôi</h6>
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <div class="leave-comment">
                                                <h4>Để lại một bình luận</h4>
                                                <form method="post" id="detailForm" name="detailForm" action="" class="detailForm">
                                                    <input type="hidden" name="method" value="POST">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group border-success">
                                                                <label class="label " for="name">Họ và tên</label>
                                                                <input type="text" class="form-control" name="name" id="name" placeholder="Họ và tên">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="label" for="email">Địa chỉ email</label>
                                                                <input type="text" class="form-control" name="email" id="email" placeholder="Địa chỉ email">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="label" for="message">Nội dung</label>
                                                                <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Nội dung liên hệ"></textarea>
                                                            </div>
                                                            <button type="submit" class="site-btn">Gửi</button>
                                                            <div class="submitting"></div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <style>
          

.product-quality h6,
.product-sizes h6 {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.quality-item span {
    font-size: 14px;
    color: #555;
    background-color: #e0e0e0;
    padding: 5px 10px;
    border-radius: 4px;
    display: inline-block;
}

.size-options {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.size-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}

.size-item input[type="radio"] {
    display: none;
}

.size-item label {
    font-size: 14px;
    color: #555;
    padding: 5px 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.size-item input[type="radio"]:checked + label {
    background-color: #4CAF50;
    color: #fff;
    border-color: #4CAF50;
    font-weight: bold;
}

.size-item label:hover {
    background-color: #f0f0f0;
    border-color: #bbb;
}

        </style>

<?php

    }
}
