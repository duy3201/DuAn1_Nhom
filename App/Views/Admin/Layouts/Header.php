<?php

namespace App\Views\Admin\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
?>
        ?>

        <!-- Required meta tags -->

        <!-- plugins:css -->
        <link rel="stylesheet" href="/public/assets/admin/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="/public/assets/admin/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="/public/assets/admin/vendors/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="/public/assets/admin/vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="/public/assets/admin/vendors/owl-carousel-2/owl.carousel.min.css">
        <link rel="stylesheet" href="/public/assets/admin/vendors/owl-carousel-2/owl.theme.default.min.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="/public/assets/admin/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="/public/assets/admin/images/favicon.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>





        <div class="container-scroller">
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                    <a class="sidebar-brand brand-logo" href="/admin"><img src="/public/assets/admin/images/logo2.png" alt="logo" /></a>
                    <a class="sidebar-brand brand-logo-mini" href="/admin"><img src="/public/assets/admin/images/logo-mini.svg" alt="logo" /></a>
                </div>
                <ul class="nav">
                    <li class="nav-item profile">
                        <div class="profile-desc">
                            <div class="profile-pic">
                                <div class="count-indicator">
                                    <i class="fa-solid fa-user"></i>
                                    <!-- <span class="count bg-success"></span> -->
                                </div>
                                <div class="profile-name">
                                    <h5 class="mb-0 font-weight-normal">Admin</h5>
                                </div>
                            </div>
                        </div>
                        </li>
                    <li class="nav-item nav-category">
                        <span class="nav-link">Điều hướng</span>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="/admin">
                            <span class="menu-icon">
                                <i class="mdi mdi-speedometer"></i>
                            </span>
                            <span class="menu-title">Chi tiết thống kê</span>
                        </a>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#product-category" aria-expanded="false" aria-controls="product-category">
                            <span class="menu-icon">
                                <i class="fa-solid fa-clipboard-list"></i>
                            </span>
                            <span class="menu-title">Danh mục sản phẩm</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="product-category">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/admin/categoryproduct">Danh mục</a></li>
                                <li class="nav-item"> <a class="nav-link" href="/admin/categoryproduct/createcategory">Thêm danh mục</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#variant-management" aria-expanded="false" aria-controls="variant-management">
                            <span class="menu-icon">
                                <i class="fa-solid fa-clipboard-list"></i>
                            </span>
                            <span class="menu-title">Quản lý biến thể</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="variant-management">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/admin/productvariants">Biến thể</a></li>
                                <li class="nav-item"> <a class="nav-link" href="/admin/productvariants/createvariant">Thêm biến thể</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#product-management" aria-expanded="false" aria-controls="product-management">
                            <span class="menu-icon">
                                <i class="fa-solid fa-clipboard-list"></i>
                            </span>
                            <span class="menu-title">Quản lý sản phẩm</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="product-management">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/products">Sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/products/createproduct">Thêm sản phẩm</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#auctions" aria-expanded="false" aria-controls="auctions">
                            <span class="menu-icon">
                                <i class="fa-solid fa-clipboard-list"></i>
                            </span>
                            <span class="menu-title">Quản lý đấu giá</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auctions">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/admin/auctions">Đấu giá</a></li>
                                <li class="nav-item"> <a class="nav-link" href="/admin/auctions/create">Thêm đấu giá</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#post-category" aria-expanded="false" aria-controls="post-category">
                            <span class="menu-icon">
                                <i class="fa-solid fa-clipboard-list"></i>
                            </span>
                            <span class="menu-title">Danh mục bài viết</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="post-category">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/admin/categoryiespost">Danh sách danh mục</a></li>
                                <li class="nav-item"> <a class="nav-link" href="/admin/categoryiespost/createcategorypost">Thêm danh mục</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#post-management" aria-expanded="false" aria-controls="post-management">
                        <span class="menu-icon">
                                <i class="fa-solid fa-clipboard-list"></i>
                            </span>
                            <span class="menu-title">Quản lý bài viết</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="post-management">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/admin/posts">Danh sách bài viết</a></li>
                                <li class="nav-item"> <a class="nav-link" href="/admin/posts/createpost">Thêm bài viết</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#comments" aria-expanded="false" aria-controls="comments">
                            <span class="menu-icon">
                                <i class="fa-solid fa-clipboard-list"></i>
                            </span>
                            <span class="menu-title">Quản lý bình luận</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="comments">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/admin/comments">Danh sách bình luận</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#user-management" aria-expanded="false" aria-controls="user-management">
                            <span class="menu-icon">
                                <i class="fa-solid fa-clipboard-list"></i>
                            </span>
                            <span class="menu-title">Quản lý người dùng</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="user-management">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/admin/users">Người dùng</a></li>
                                <li class="nav-item"> <a class="nav-link" href="/admin/users/createuser">Thêm người dùng</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="container-fluid">
                <!-- partial:../../partials/_navbar.html -->
                <nav class="navbar p-0 fixed-top d-flex flex-row">
                    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="/admin"><img src="/public/assets/admin/images/logo-mini.svg" alt="logo" /></a>
                    </div>
                    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                            <span class="mdi mdi-menu"></span>
                        </button>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item dropdown">
                                <?php if (!empty($_SESSION['user'])) : ?>
                                    <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                        <div class="navbar-profile">
                                            <i class="fa-solid fa-user"></i>
                                            <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo htmlspecialchars($_SESSION['user']['username']); ?></p>
                                            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                        <a class="dropdown-item preview-item" href="/logout">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-dark rounded-circle">
                                                    <i class="mdi mdi-logout text-danger"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content">
                                                <p class="preview-subject mb-1">Đăng Xuất</p>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                            <span class="mdi mdi-format-line-spacing"></span>
                        </button>
                    </div>
                </nav>
        <?php

    }
}

        ?>