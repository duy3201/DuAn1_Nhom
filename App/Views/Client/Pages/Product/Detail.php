<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
        // var_dump($_SESSION);
        ?>


        <section class="product-shop spad page-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="filter-widget">
                            <h4 class="fw-title">Thể loại</h4>
                            <ul class="filter-catagories">
                                <li><a href="#">Nam</a></li>
                                <li><a href="#">Phụ nữ</a></li>
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
                        <div class="filter-widget">
                            <h4 class="fw-title">Giá</h4>
                            <div class="filter-range-wrap">
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="33" data-max="2500">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                            </div>
                            <a href="#" class="filter-btn">Lọc</a>
                        </div>
                        <!-- <div class="filter-widget">
                            <h4 class="fw-title">Màu</h4>
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
                                    <label class="cs-blue" for="cs-blue">Xanh</label>
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
                                    <label class="cs-green" for="cs-green">Xanh Lá</label>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="filter-widget">
                            <h4 class="fw-title">Kích thước</h4>
                            <div class="fw-size-choose">
                                <div class="sc-item">
                                    <input type="radio" id="s-size">
                                    <label for="s-size">s</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" id="m-size">
                                    <label for="m-size">m</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" id="l-size">
                                    <label for="l-size">l</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" id="xs-size">
                                    <label for="xs-size">xs</label>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="filter-widget">
                            <h4 class="fw-title">Thẻ</h4>
                            <div class="fw-tags">
                                <a href="#">Khăn</a>
                                <a href="#">Giày</a>
                                <a href="#">Áo khoác</a>
                                <a href="#">Váy</a>
                                <a href="#">Quần Dài</a>
                                <a href="#">Mũ</a>
                                <a href="#">Balo</a>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-pic-zoom">
                                    <img class="product-big-img" src="/public/assets/client/img/products/product-1.jpg" alt="">
                                    <div class="zoom-icon">
                                        <i class="fa fa-search-plus"></i>
                                    </div>
                                </div>
                                <div class="product-thumbs">
                                    <div class="product-thumbs-track ps-slider owl-carousel">
                                        <div class="pt active" data-imgbigurl="/public/assets/client/img/products/product-1.jpg"><img
                                                src="/public/assets/client/img/products/product-1.jpg" alt=""></div>
                                        <div class="pt" data-imgbigurl="/public/assets/client/img/products/product-1.jpg"><img
                                                src="/public/assets/client/img/products/product-1.jpg" alt=""></div>
                                        <div class="pt" data-imgbigurl="/public/assets/client/img/products/product-1.jpg"><img
                                                src="/public/assets/client/img/products/product-1.jpg" alt=""></div>
                                        <div class="pt" data-imgbigurl="/public/assets/client/img/products/product-1.jpg"><img
                                                src="/public/assets/client/img/products/product-1.jpg" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-details">
                                    <div class="pd-title">
                                        <!-- <span>oranges</span> -->
                                        <h3>Pure Pineapple</h3>
                                        <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                    </div>
                                    <div class="pd-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>(5)</span>
                                    </div>
                                    <div class="pd-desc">
                                        <p>Điều quan trọng là phải kiên nhẫn, được bệnh nhân theo dõi, nhưng đồng thời tôi cũng
                                            chỉ là một bệnh nhân
                                            điều quan trọng là sự ủng hộ của nhà phát triển sẽ được theo đuổi, nhưng tôi sẽ cho
                                            nó thời gian</p>
                                        <h4>495.000.VNĐ <span>629.000.VNĐ</span></h4>
                                    </div>
                                    <div class="pd-color">
                                        <h6>Màu</h6>
                                        <div class="pd-color-choose">
                                            <div class="cc-item">
                                                <input type="radio" id="cc-black">
                                                <label for="cc-black"></label>
                                            </div>
                                            <div class="cc-item">
                                                <input type="radio" id="cc-yellow">
                                                <label for="cc-yellow" class="cc-yellow"></label>
                                            </div>
                                            <div class="cc-item">
                                                <input type="radio" id="cc-violet">
                                                <label for="cc-violet" class="cc-violet"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pd-size-choose">
                                        <div class="sc-item">
                                            <input type="radio" id="sm-size">
                                            <label for="sm-size">s</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="md-size">
                                            <label for="md-size">m</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="lg-size">
                                            <label for="lg-size">l</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="xl-size">
                                            <label for="xl-size">xs</label>
                                        </div>
                                    </div>
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                        <a href="#" class="primary-btn pd-cart">Thêm giỏ hàng</a>
                                    </div>
                                    <ul class="pd-tags">
                                        <li><span>THỂ LOẠI</span>: Thêm phụ kiện, ví & hộp đựng</li>
                                        <li><span>THẺ</span>:Quần áo, Áo thun, Phụ nữ</li>
                                    </ul>
                                    <div class="pd-share">
                                        <div class="p-code">Mã : 00012</div>
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
                                                    <h5>Giới thiệu</h5>
                                                    <p>Việc có bệnh nhân là rất quan trọng nhưng tôi sẽ phải trả tiền cho việc
                                                        đó
                                                        Lúc đó họ lâm vào tình trạng chuyển dạ và đau đớn tột độ. Vì điều đó
                                                        Tôi sẽ đến ít nhất, ai có thể thực hành bất kỳ loại công việc nào ngoại
                                                        trừ việc đó
                                                        một số trong đó là hữu ích. Đừng vội vào nhà </p>
                                                    <h5>Giới Thiệu</h5>
                                                    <p>Việc có bệnh nhân là rất quan trọng nhưng tôi sẽ phải trả tiền cho việc
                                                        đó
                                                        Lúc đó họ lâm vào tình trạng chuyển dạ và đau đớn tột độ. Vì điều đó
                                                        Tôi sẽ đến ít nhất, ai có thể thực hành bất kỳ loại công việc nào ngoại
                                                        trừ việc đó
                                                        một số trong đó là hữu ích. Đừng vội vào nhà </p>
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
                                                <form action="#" class="comment-form">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input type="text" placeholder="Name">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" placeholder="Email">
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <textarea placeholder="Messages"></textarea>
                                                            <button type="submit" class="site-btn">Gửi</button>
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


        <?php

    }
}
