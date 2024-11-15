<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    { ?>
        <!DOCTYPE html>
        <html lang="zxx">

        <head>
            <meta charset="UTF-8">
            <meta name="description" content="Fashi Template">
            <meta name="keywords" content="Fashi, unica, creative, html">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Old Style Store</title>

            <!-- Google Font -->
            <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

            <!-- Css Styles -->
            <!-- Google Font -->

            <!-- Css Styles -->
            <link rel="stylesheet" href="/public/assets/client/css copy/style.css">
            <link rel="stylesheet" href="/public/assets/client/css copy/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="/public/assets/client/css copy/font-awesome.min.css" type="text/css">
            <link rel="stylesheet" href="/public/assets/client/css copy/themify-icons.css" type="text/css">
            <link rel="stylesheet" href="/public/assets/client/css copy/elegant-icons.css" type="text/css">
            <link rel="stylesheet" href="/public/assets/client/css copy/owl.carousel.min.css" type="text/css">
            <link rel="stylesheet" href="/public/assets/client/css copy/nice-select.css" type="text/css">
            <link rel="stylesheet" href="/public/assets/client/css copy/jquery-ui.min.css" type="text/css">
            <link rel="stylesheet" href="/public/assets/client/css copy/slicknav.min.css" type="text/css">
            <link rel="stylesheet" href="/public/assets/client/css copy/style.css" type="text/css">
          


        </head>

        <body>
            <!-- Page Preloder -->
            <div id="preloder">
                <div class="loader"></div>
            </div>

            <!-- Header Section Begin -->
            <header class="header-section">
                <div class="container">
                    <div class="inner-header">
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <div class="logo">
                                    <a href=".">
                                        <img src="/public/assets/client/img/logo1.png" alt="Logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <div class="advanced-search">
                                    <button type="button" class="category-btn">Sản phẩm mới</button>
                                    <div class="input-group">
                                        <input type="text" placeholder="Bạn cần gì?">
                                        <button type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-3 text-right col-md-3">
                                <ul class="nav-right">
                                    <li class="heart-icon">
                                        <a href="#">
                                            <i class="icon_heart_alt"></i>
                                            <span>1</span>
                                        </a>
                                    </li>

                                    <li class="cart-icon">
                                        <a href="#">
                                            <i class="icon_bag_alt"></i>
                                            <span>3</span>
                                        </a>
                                        <div class="cart-hover">
                                            <div class="select-items">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="si-pic"><img src="/public/assets/client/img/select-product-1.jpg" alt=""></td>
                                                            <td class="si-text">
                                                                <div class="product-selected">
                                                                    <p>$60.00 x 1</p>
                                                                    <h6>Bàn cạnh giường Kabino</h6>
                                                                </div>
                                                            </td>
                                                            <td class="si-close">
                                                                <i class="ti-close"></i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="si-pic"><img src="/public/assets/client/img/select-product-2.jpg" alt=""></td>
                                                            <td class="si-text">
                                                                <div class="product-selected">
                                                                    <p>$60.00 x 1</p>
                                                                    <h6>Bàn cạnh giường Kabino</h6>
                                                                </div>
                                                            </td>
                                                            <td class="si-close">
                                                                <i class="ti-close"></i>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="select-total">
                                                <span>Tổng cộng:</span>
                                                <h5>$120.00</h5>
                                            </div>
                                            <div class="select-button">
                                                <a href="/card" class="primary-btn view-card">Xem giỏ hàng</a>
                                                <a href="/CheckOut" class="primary-btn checkout-btn">Thanh toán</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- tài khoản -->
                                    <!-- Đăng nhập, đăng ký, đăng xuất -->
                                    <li class="heart-icon dropdown">
                                        <a href="/login" class="dropdown-toggle">
                                            <img src="/public/assets/client/img/iconuser.png" alt="" width="25px" class="mb-1">
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="/login" class="dropdown-item">Đăng nhập</a>
                                            <a href="/register" class="dropdown-item">Đăng ký</a>
                                            <a href="/lotout" class="dropdown-item">Đăng xuất</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-item">
                    <div class="container">
                        <div class="nav-depart">
                            <div class="depart-btn">
                                <i class="ti-menu"></i>
                                <span>Danh mục sản phẩm </span>
                                <ul class="depart-hover">
                                    <li class="active"><a href="#">Thời trang nữ</a></li>
                                    <li><a href="#">Thời trang nam</a></li>
                                    <li><a href="#">Thời trang trẻ em</a></li>

                                </ul>
                            </div>
                        </div>
                        <nav class="nav-menu mobile-menu">
                            <ul>
                                <li class="active"><a href="/">Trang chủ</a></li>
                                <li><a href="/products">Cửa hàng</a></li>
                                <li><a href="/introduce">Giới thiệu</a>

                                </li>
                                <li><a href="/blogs">Bài viết</a></li>
                                <li><a href="/contact">Liên hệ</a></li>
                                <!-- <li><a href="#">Trang</a>
                                <ul class="dropdown">
                                    <li><a href="./blog-details.html">Chi tiết Blog</a></li>
                                    <li><a href="./shopping-cart.html">Giỏ hàng</a></li>
                                    <li><a href="./check-out.html">Thanh toán</a></li>
                                    <li><a href="./faq.html">Câu hỏi thường gặp</a></li>
                                    <li><a href="./register.html">Đăng ký</a></li>
                                    <li><a href="./login.html">Đăng nhập</a></li>
                                </ul>
                            </li> -->
                            </ul>
                        </nav>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                </div>
            </header>
            <!-- Header End -->

    <?php }
}
