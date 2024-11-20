<?php

namespace App\Views\Client\Pages;

use App\Views\BaseView;

class Blogs extends BaseView
{
  public static function render($data = null)
  {
?>



    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="breadcrumb-text">
              <a href="/"><i class="fa fa-home"></i> Trang chủ</a>
              <span>Bài viết</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
            <div class="blog-sidebar">
              <div class="search-form">
                <h4>Tìm kiếm</h4>
                <form action="#">
                  <input type="text" placeholder="Tìm kiếm . . .  ">
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div>
              <div class="blog-catagory">
                <h4>Danh mục</h4>
                <ul>
                  <li><a href="#">Thời trang</a></li>
                  <li><a href="#">Du lịch</a></li>
                  <li><a href="#">Dã ngoại</a></li>
                  <li><a href="#">Mẫu</a></li>
                </ul>
              </div>
              <div class="recent-post">
                <h4>Bài viết gần đây</h4>
                <div class="recent-blog">
                  <a href="#" class="rb-item">
                    <div class="rb-pic">
                      <img src="/public/assets/client/img/blog/recent-1.jpg" alt="">
                    </div>
                    <div class="rb-text">
                      <h6>Đặc điểm tính cách khiến mọi người hạnh phúc hơn...</h6>
                      <p>Thời trang <span>- 19 Tháng 5, 2019</span></p>
                    </div>
                  </a>
                  <a href="#" class="rb-item">
                    <div class="rb-pic">
                      <img src="/public/assets/client/img/blog/recent-2.jpg" alt="">
                    </div>
                    <div class="rb-text">
                      <h6>Đặc điểm tính cách khiến mọi người hạnh phúc hơn...</h6>
                      <p>Thời trang <span>- 19 Tháng 5, 2019</span></p>
                    </div>
                  </a>
                  <a href="#" class="rb-item">
                    <div class="rb-pic">
                      <img src="/public/assets/client/img/blog/recent-3.jpg" alt="">
                    </div>
                    <div class="rb-text">
                      <h6>Đặc điểm tính cách khiến mọi người hạnh phúc hơn...</h6>
                      <p>Thời trang <span>- 19 Tháng 5, 2019</span></p>
                    </div>
                  </a>
                  <a href="#" class="rb-item">
                    <div class="rb-pic">
                      <img src="/public/assets/client/img/blog/recent-4.jpg" alt="">
                    </div>
                    <div class="rb-text">
                      <h6>Đặc điểm tính cách khiến mọi người hạnh phúc hơn...</h6>
                      <p>Thời trang <span>- 19 Tháng 5, 2019</span></p>
                    </div>
                  </a>
                </div>
              </div>
              <!-- <div class="blog-tags">
                <h4>Tags sản phẩm</h4>
                <div class="tag-item">
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
          </div>
          <div class="col-lg-9 order-1 order-lg-2">
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                <div class="blog-item">
                  <div class="bi-pic">
                    <img src="/public/assets/client/img/blog/blog-1.jpg" alt="">
                  </div>
                  <div class="bi-text">
                    <a href="./blog-details.html">
                      <h4>Đặc điểm tính cách khiến mọi người hạnh phúc hơn</h4>
                    </a>
                    <p>Du lịch <span>- 19 Tháng 5, 2019</span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-6">
                <div class="blog-item">
                  <div class="bi-pic">
                    <img src="/public/assets/client/img/blog/blog-2.jpg" alt="">
                  </div>
                  <div class="bi-text">
                    <a href="./blog-details.html">
                      <h4>Đây là một trong những ngày đầu tiên của chúng tôi ở Hawaii tuần trước.</h4>
                    </a>
                    <p>Thời trang <span>- 19 Tháng 5, 2019</span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-6">
                <div class="blog-item">
                  <div class="bi-pic">
                    <img src="/public/assets/client/img/blog/blog-3.jpg" alt="">
                  </div>
                  <div class="bi-text">
                    <a href="./blog-details.html">
                      <h4>Tuần trước tôi có chuyến công tác đầu tiên trong năm đến Sonoma Valley</h4>
                    </a>
                    <p>Du lịch <span>- 19 Tháng 5, 2019</span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-6">
                <div class="blog-item">
                  <div class="bi-pic">
                    <img src="/public/assets/client/img/blog/blog-4.jpg" alt="">
                  </div>
                  <div class="bi-text">
                    <a href="./blog-details.html">
                      <h4>Chúc Mừng Năm Mới! Biết là tôi hơi trễ trong bài viết này</h4>
                    </a>
                    <p>Thời trang <span>- 19 Tháng 5, 2019</span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-6">
                <div class="blog-item">
                  <div class="bi-pic">
                    <img src="/public/assets/client/img/blog/blog-5.jpg" alt="">
                  </div>
                  <div class="bi-text">
                    <a href="./blog-details.html">
                      <h4>Bộ sưu tập Absolue. Đội ngũ Lancome đã làm việc rất chăm chỉ...</h4>
                    </a>
                    <p>Mẫu <span>- 19 Tháng 5, 2019</span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-6">
                <div class="blog-item">
                  <div class="bi-pic">
                    <img src="/public/assets/client/img/blog/blog-6.jpg" alt="">
                  </div>
                  <div class="bi-text">
                    <a href="./blog-details.html">
                      <h4>Viết lách luôn là cách giúp tôi thư giãn</h4>
                    </a>
                    <p>Thời trang <span>- 19 Tháng 5, 2019</span></p>
                  </div>
                </div>
              </div>
              <!-- <div class="col-lg-12">
                <div class="loading-more">
                  <i class="icon_loading"></i>
                  <a href="#">
                    Tải thêm
                  </a>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog Section End -->



<?php
  }
}
?>