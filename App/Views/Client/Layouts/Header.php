<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Header extends BaseView
{

     public static function render($data = null)
     { ?>
          <div class="container-header">
               <div class="tab-bar">
                    <div class="container text-center">
                         <div class="row">
                              <div class="col-md-4 hi">Chào mừng bạn đên với shop của chúng tôi</div>
                              <div class="col-md-2 offset-md-4 icon-header">
                                   <a class="nav-link" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                   <a class="nav-link" href="#"><i class="fa-brands fa-tiktok"></i></a>
                                   <a class="nav-link" href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                   <a class="nav-link" href="#"><i class="fa-brands fa-youtube"></i></a>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="menu">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                         <div class="container-fluid">
                              <a class="navbar-brand" href="#"><img src="/public/img/z5831525310638_5b89f4880e99ed7236cfe5f2de6b6927.jpg" width="25%" alt=""></a>
                              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                   <span class="navbar-toggler-icon"></span>
                              </button>
                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                   <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                             <a class="nav-link active" aria-current="page" href="/">Trang chủ</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                             <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                  Sản phẩm
                                             </a>
                                             <ul class="dropdown-menu">
                                                  <li><a class="dropdown-item" href="/products">Sản phẩm nổi bật</a></li>
                                                  <li><a class="dropdown-item" href="/products">Phong cách đơn giản</a></li>
                                                  <li><a class="dropdown-item" href="/products">Thời trang cổ điển</a></li>
                                             </ul>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" href="#">Giới thiệu</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" href="#">Tin tức</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" href="#">Liên hệ</a>
                                        </li>
                                   </ul>
                                   <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-login">
                                             <a class="nav-link" href="/login">Đăng nhập</a>
                                             <a class="nav-link" href="/register">Đăng ký</a>
                                        </li>
                                        <li class="nav-icon">
                                             <a class="nav-link" href="/card"><i class="fa-solid fa-cart-shopping"></i></a>
                                             <a class="nav-link" href="#"><i class="fa-regular fa-heart"></i></a>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                    </nav>
               </div>
          </div>
<?php }
}
