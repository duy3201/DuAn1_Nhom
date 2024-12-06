<?php

namespace App\Views\Client;

use App\Views\BaseView;


class Home extends BaseView
{
    public static function render($data = null)
    {
        
?>



        <!-- Phần Hero Bắt Đầu -->
        <section class="hero-section">
            <div class="hero-items owl-carousel">
                <!-- <div class="single-hero-items set-bg" data-setbg="/public/assets/client/img/hero-1.jpg"> -->
                <div class="single-hero-items set-bg" data-setbg="/public/assets/client/img/oke3..png">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 text-white">
                                <span class="text-white"> Đồ giảm giá</span>
                                <h1 class="text-white">Sale</h1>
                                <p class="text-white">Hãy khám phá những sản phẩm tuyệt vời với mức giá ưu đãi trong dịp Black Friday.</p>
                                <a href="/products" class="primary-btn">Mua ngay</a>
                            </div>

                        </div>
                        <div class="off-card">
                            <h2>Giảm giá <span>50%</span></h2>
                        </div>
                    </div>
                </div>
                <div class="single-hero-items set-bg" data-setbg="/public/assets/client/img/KHOA1.PNG">
                    <!-- <div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                <span>Túi xách, trẻ em</span>
                                <h1>Black Friday</h1>
                                <p>Khám phá những ưu đãi hấp dẫn và sản phẩm tuyệt vời dành cho bạn trong mùa Black Friday này.</p>
                                <a href="#" class="primary-btn">Mua ngay</a>
                            </div>

                            <div class="off-card">
                                <h2>Giảm giá <span>50%</span></h2>
                            </div>
                        </div>
                    </div> -->
                </div>
        </section>
        <!-- Phần Hero Kết Thúc -->

        <!-- Phần Banner Bắt Đầu -->
        <div class="banner-section spad">
            <div class="container-fluid">
                <div class="row">
                      <?php foreach ($data['categories'] as $category) : ?>
    <div class="col-lg-4">
        <a href="/products/categories/<?= htmlspecialchars($category['id']); ?>">
            <div class="single-banner">
                <img src="<?= APP_URL ?>/public/assets/client/img/<?= htmlspecialchars($category['img']); ?>" alt="">


                <div class="inner-text">
                    <h4><?= htmlspecialchars($category['name']); ?></h4>
                </div>
            </div>
        </a>
    </div>

  
<?php endforeach; ?>
        </div>
        </div>
        </div>
        <!-- Phần Banner Kết Thúc -->


        <!-- Phần Banner Nữ Bắt Đầu -->
        <!-- <section class="women-banner spad">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="product-large set-bg" data-setbg="/public/assets/client/img/products/women-large.jpg">
                            <h2>Nữ</h2>
                            <a href="#">Khám Phá Thêm</a>
                        </div>
                    </div>
                    <div class="col-lg-8 offset-lg-1">
                        <div class="filter-control">
                            <ul>
                                <li class="active">Trang phục</li>
                                <li>Túi xách</li>
                                <li>Giày</li>
                                <li>Phụ kiện</li>
                            </ul>
                        </div>
                        <div class="product-slider owl-carousel">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="/public/assets/client/img/products/women-1.jpg" alt="">
                                    <div class="sale">Giảm giá</div>
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
                                        <h5>Pure Pineapple</h5>
                                    </a>
                                    <div class="product-price">
                                        $14.00
                                        <span>$35.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="/public/assets/client/img/products/women-2.jpg" alt="">
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
                                        $13.00
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="/public/assets/client/img/products/women-3.jpg" alt="">
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
                                        <h5>Pure Pineapple</h5>
                                    </a>
                                    <div class="product-price">
                                        $34.00
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="/public/assets/client/img/products/women-4.jpg" alt="">
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
                                        <h5>Giày Converse</h5>
                                    </a>
                                    <div class="product-price">
                                        $34.00
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Phần Banner Nữ Kết Thúc -->
        <!-- Phần Banner Nam Bắt Đầu -->
        <section class="man-banner spad">
            <div class="container">

                <div class="row">

                    <div class="col-lg-12">
                        <div class="filter-control">
                            <!-- <ul>
                                <li class="active">Trang phục</li>
                                <li>Túi xách</li>
                                <li>Giày</li>
                                <li>Phụ kiện</li>
                            </ul> -->
                            <div class="section-title">
                                <h2>Sản Phẩm Nổi Bật</h2>
                            </div>
                        </div>

                        <?php if (count($data) && count($data['products'])) : ?>
                            
                            <div class="product-slider owl-carousel">
                                <?php foreach ($data['products'] as $item) : ?>
                                    <div class="product-item">
                                        <div class="pi-pic">

                                            <img src=" <?= APP_URL ?>/public/assets/admin/img/<?= $item['img'] ?>" alt="">
                                            <!-- <div class="sale">Giảm giá</div> -->
                                            <div class="icon">
                                                <!-- <i class="icon_heart_alt"></i> -->
                                            </div>
                                            <ul>
                                                <!-- <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li> -->
                                                <li class="quick-view"><a href="/products/<?= $item['id'] ?>"> Xem chi tiết</a></li>
                                                <!-- <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li> -->
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name"><?= $item['category_name'] ?></div>
                                            <a href="#">
                                                <h5><?= $item['name'] ?></h5>
                                            </a>
                                            <div class="price text-warning ">
                                                <?= !empty($item['product_price']) ? number_format($item['product_price'], 0, ',', '.') . ' VNĐ' : 'Liên hệ'; ?>
                                            </div>
                                        </div>

                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <h3 class="text-center text-danger">Không có sản phẩm</h3>
                            <?php endif; ?>
                            </div>
                    </div>
                    <!-- <div class="col-lg-3 offset-lg-1">
                        <div class="product-large set-bg m-large" data-setbg="/public/assets/client/img/products/man-large.jpg">
                            <h2>Nam</h2>
                            <a href="#">Khám Phá Thêm</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- Phần Banner Nam Kết Thúc -->
        <div class="container-fulid">
            <!-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/public/uploads/products/bg_breadcrumb1.jpg" class="d-block w-100" alt="...">
            </div>
            
        </div>
    </div> -->
            <div id="auctionCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $isActive = true; ?>
                    <?php foreach ($data['auctions'] as $item) : ?>
                        <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
                            <section class="deal-of-week set-bg spad" data-setbg="/public/assets/client/img/time-bg1.jpg">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <div class="section-title">
                                                <h2>Đấu giá sản phẩm <?= htmlspecialchars($item['products_name']) ?></h2>
                                                <p><?= htmlspecialchars($item['product_description']) ?></p>
                                                <div class="product-price">
                                                    <h5 class="text-dark mb-2">Giá khởi điểm:</h5>
                                                    <h4 class="text-warning"><?= number_format($item['starting_price'], 0, ',', '.') ?> VNĐ</h4>
                                                </div>
                                            </div>
                                            <div class="time-info mb-4 d-flex justify-content-center align-items-center">
                                                <div class="time-item me-5">
                                                    <h5 class="text-dark"><?= date('d/m/Y H:i', strtotime($item['start_time'])) ?></h5>
                                                    <p class="text-muted">Bắt đầu</p>
                                                </div>
                                                <div class="time-item">
                                                    <h5 class="text-dark"><?= date('d/m/Y H:i', strtotime($item['end_time'])) ?></h5>
                                                    <p class="text-muted">Kết thúc</p>
                                                </div>
                                            </div>
                                            <a href="/<?= htmlspecialchars($item['id']); ?>" class="primary-btn">Đấu giá</a>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <img src="/public/assets/admin/img/<?= htmlspecialchars($item['product_img']) ?>" alt="Ảnh Sản phẩm" class="img-fluid" style="max-height: 400px; object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <?php $isActive = false; ?>
                    <?php endforeach; ?>
                </div>
                
                <!-- Điều khiển carousel -->
                <a class="carousel-control-prev" href="#auctionCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#auctionCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>






            <!-- Phần Blog Mới Nhất Bắt Đầu -->
            <section class="latest-blog spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2>Bài Viết Mới</h2>
                            </div>
                        </div>
                    </div>
                    <?php if (count($data) && count($data['posts'])) : ?>
                        <div class="row">
                            <?php foreach ($data['posts'] as $item) : ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-latest-blog">
                                        <img src="<?= APP_URL ?>/public/assets/admin/img/<?= $item['img'] ?>" alt="">
                                        <div class="latest-text">
                                            <div class="tag-list">
                                                <div class="tag-item">
                                                    <i class="fa fa-calendar-o"></i>
                                                    4 Tháng 5, 2019
                                                </div>
                                                <div class="tag-item">
                                                    <i class="fa fa-comment-o"></i>
                                                    5
                                                </div>
                                            </div>
                                            <a href="#">
                                                <h4><?= $item['title'] ?></h4>
                                            </a>
                                            <p>
                                                <?= implode(' ', array_slice(explode(' ', strip_tags($item['content'])), 0, 20)) . '...'; ?>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <h3 class="text-center text-danger">Không có bài viết mới nào</h3>
                    <?php endif; ?>
                    <div class="benefit-items">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="single-benefit">
                                    <div class="sb-icon">
                                        <img src="/public/assets/client/img/icon-1.png" alt="">
                                    </div>
                                    <div class="sb-text">
                                        <h6>Miễn Phí Vận Chuyển</h6>
                                        <p>Cho tất cả các đơn hàng trên 99$</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="single-benefit">
                                    <div class="sb-icon">
                                        <img src="/public/assets/client/img/icon-2.png" alt="">
                                    </div>
                                    <div class="sb-text">
                                        <h6>Giao Hàng Đúng Hẹn</h6>
                                        <p>Chúng tôi sẽ giao hàng đúng thời gian đã hứa</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="single-benefit">
                                    <div class="sb-icon">
                                        <img src="/public/assets/client/img/icon-3.png" alt="">
                                    </div>
                                    <div class="sb-text">
                                        <h6>Thanh Toán An Toàn</h6>
                                        <p>Thanh toán 100% an toàn</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Phần Blog Mới Nhất Kết Thúc -->
            <script></script>

    <?php
    }
}
    ?>