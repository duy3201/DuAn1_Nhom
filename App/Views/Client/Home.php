<?php

namespace App\Views\Client;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="home">
            <div class="bannder">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/public/img/banner-header.jpeg" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <h1>Old Style</h1>
                                <p>Khám phá phong cách với những món đồ second-hand duy nhất!</p>
                            </div>
                        </div>
                        <div class="carousel-item active">
                            <img src="/public/img/banner-header.jpeg" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <h1>Old Style</h1>
                                <p>Khám phá phong cách với những món đồ second-hand duy nhất!</p>
                            </div>
                        </div>
                        <div class="carousel-item active">
                            <img src="/public/img/banner-header.jpeg" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <h1>Old Style</h1>
                                <p>Khám phá phong cách với những món đồ second-hand duy nhất!</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="category-header">
                <div class="product-section">
                    <h2>Danh mục sản phẩm</h2>
                    <div class="product-grid">
                        <!-- Thẻ sản phẩm 1 -->
                        <div class="product-card">
                            <img src="/public/img/ao-phong-lv-023220-7.jpg" alt="Louis Vuitton">
                            <div class="product-overlay">Louis Vuitton</div>
                        </div>
                        <!-- Thẻ sản phẩm 2 -->
                        <div class="product-card">
                            <img src="/public/img/ao-thun-couple-gucci.jpg" alt="Gucci">
                            <div class="product-overlay">Gucci</div>
                        </div>
                        <!-- Thẻ sản phẩm 3 -->
                        <div class="product-card">
                            <img src="/public/img/20930114029-ao-vay-chanel-vai-tweed-chinh-hang.jpg" alt="Chanel">
                            <div class="product-overlay">Chanel</div>
                        </div>
                        <!-- Thẻ sản phẩm 4 -->
                        <div class="product-card">
                            <img src="/public/img/vdcs.jpg" alt="Coach">
                            <div class="product-overlay">Coach</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="category-baner1">
                    <div class="image-container">
                        <img src="/public/img/73772096bf107687ebee1d2a8c1272a9.jpg" alt="Hình ảnh 1">
                        <div class="dark-overlay"></div>
                        <div class="text-overlay"><a href="#">Sản phẩm nổi bật</a></div>
                    </div>
                </div>
                <div class="category-baner2">
                    <div class="image-container">
                        <img src="/public/img/e2c08678a0c47c2cb1acbfccb14f49d4.jpg" alt="Hình ảnh 2">
                        <div class="dark-overlay"></div>
                        <div class="text-overlay"><a href="#">Phong cách tối giản</a></div>
                    </div>
                    <div class="image-container">
                        <img src="/public/img/quan-ao-chat-luong-hang-dau-tai-kho-nha-minh.jpg" alt="Hình ảnh 3">
                        <div class="dark-overlay"></div>
                        <div class="text-overlay"><a href="#">Thời trang cổ điển</a></div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }

}
?>
