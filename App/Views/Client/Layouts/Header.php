<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Models\Product;
use App\Views\BaseView;
use App\Views\Client\Components\Category as ComponentsCategory;
use App\Views\Client\Components\CategoryMenu;

class Header extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
        $cartItems = isset($_COOKIE['carts_detail']) ? json_decode($_COOKIE['carts_detail'], true) : [];
        $total = 0;

        ?>


        <title>Old Style Store</title>

        <!-- Google Font -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet"> -->

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
        <!-- Tải jQuery -->
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        


<!-- 
        <script src="/path-to-your-project/sweetalert2.min.js"></script>

        <script src="dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="dist/sweetalert.css"> -->

        

        </head>
        <!-- <style>
            .navbar .dropdown-toggle i {
                transition: transform 0.3s ease;
                /* Hiệu ứng khi icon xoay */
            }

            .navbar .dropdown-toggle[aria-expanded="true"] i {
                transform: rotate(0deg);
                /* Giữ nguyên trạng thái */
            }
        </style> -->

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
                                <a href="/">
                                    <img src="/public/assets/client/img/logo1.png" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-7 d-flex justify-content-center align-items-center">
                            <div class="advanced-search w-75">
                                <button type="button" class="category-btn">Sản phẩm mới</button>
                                <form action="/products" method="GET" class="input-group">
                                    <input type="text" name="search" placeholder="Bạn cần gì?"
                                        value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>"
                                        class="form-control">
                                    <button type="submit">
                                        <i class="ti-search"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                        <div class="col-lg-1 col-md-3 d-flex justify-content-center align-items-center">
                            <ul class="nav-right d-flex justify-content-start">
                                <!-- Yêu thích -->
                                <li class="heart-icon">
                                    <a href="#">
                                        <i class="icon_heart_alt"></i>
                                        <span>1</span>
                                    </a>
                                </li>

                                <!-- Giỏ hàng -->
                                <li class="cart-icon">
                                    <a href="#">
                                        <i class="icon_bag_alt"></i>
                                    </a>
                                    <div class="cart-hover">
                                        <?php if (!empty($cartItems)): ?>
                                            <div class="select-items">
                                                <table>
                                                    <tbody>
                                                        <?php foreach ($cartItems as $productId => $quantity): ?>
                                                            <?php
                                                            // Lấy thông tin sản phẩm từ database
                                                            $productModel = new Product();
                                                            $product = $productModel->getOneProductByStatus($productId);

                                                            if (!$product) {
                                                                // Nếu sản phẩm không tồn tại (hoặc bị xóa), bỏ qua sản phẩm này
                                                                continue;
                                                            }

                                                            $totalItemPrice = $quantity * $product['product_price'];
                                                            $total += $totalItemPrice;
                                                            ?>
                                                            <tr>
                                                                <td class="si-pic"><img
                                                                        src="/public/assets/admin/img/<?= htmlspecialchars($product['img']); ?>"
                                                                        alt="<?= htmlspecialchars($product['name']); ?>" alt=""
                                                                        style="max-width: 80px; max-height: 80px;">
                                                                </td>
                                                                <td class="si-text">
                                                                    <div class="product-selected">
                                                                        <p class="text-warning">
                                                                            <?= number_format($product['product_price'], 0, ',', '.') . ' VNĐ'; ?>
                                                                            x <?= $quantity; ?>
                                                                        </p>
                                                                        <h6><?= htmlspecialchars($product['name']); ?></h6>
                                                                    </div>
                                                                </td>
                                                                <td class="si-close"><i class="ti-close"></i></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                            <div class="select-total">
                                                <span>Tổng cộng:</span>
                                                <h5><?= number_format($total, 0, ',', '.') . ' VNĐ'; ?></h5>
                                            </div>
                                        <?php else: ?>
                                            <p class="text-center">Giỏ hàng của bạn đang trống. <a href="/products">Tiếp tục mua
                                                    sắm</a></p>
                                        <?php endif; ?>
                                        <div class="select-button">
                                            <a href="/cart" class="primary-btn view-card">Xem giỏ hàng</a>
                                            <a href="/CheckOut" class="primary-btn checkout-btn">Thanh toán</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- Tài khoản -->
                             
                                <?php if ($is_login): ?>
                                    <li>
                                        <nav class="navbar navbar-expand-lg p-0">
                                            <ul class="navbar-nav">
                                                <li class="dropdown m-0">
                                                    <a class="btn dropdown-toggle p-0" style="height: 30px;" href="#"
                                                        id="userDropdown" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa-regular fa-user"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end keep-open"
                                                        aria-labelledby="userDropdown">
                                                        <a class="dropdown-item" href="/users/<?= $_SESSION['user']['id'] ?>">Hi,
                                                            <?= $_SESSION['user']['name'] ?></a>
                                                        <a class="dropdown-item" href="/change-password">Đổi mật khẩu</a>
                                                        <a class="dropdown-item" href="/logout">Đăng Xuất</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </nav>
                                    </li>
                                <?php else: ?>
                                    <li class="dropdown">
                                        <a href="/login" class="btn dropdown-toggle p-0" id="guestDropdown">
                                            <i class="fa-regular fa-user"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end keep-open" aria-labelledby="guestDropdown">
                                            <a href="/login" class="dropdown-item">Đăng nhập</a>
                                            <a href="/register" class="dropdown-item">Đăng ký</a>
                                        </div>
                                    </li>
                                    <script>
                                        
                                    </script>
                                <?php endif; ?>

                               


                            </ul>
                        </div>


                    </div>
                </div>

            </div>
            </div>
            </div>

            <div class="nav-item">
                <div class="container">
                    <div class="nav-depart">
                        <div class="depart-btn">
                            <i class="ti-menu"></i>

                            <span>Danh mục sản phẩm <span>
                                    <ul class="depart-hover">
                                        <?php
                                        CategoryMenu::render($data['categories']);
                                        ?>
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

            <script src="/path-to-your-project/sweetalert2.min.js"></script>

        </header>
        <!-- Header End -->

        <?php


    }
}


?>