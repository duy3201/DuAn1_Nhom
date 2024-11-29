<?php
// sản phẩm theo loại

namespace App\Views\Client\Pages\Blogs;


use App\Views\BaseView;
use App\Views\Client\Components\Category as ComponentsCategory;
use App\Views\Client\Components\CategoryPost;

class Category extends BaseView
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
                <?php CategoryPost::render($data['categories_post']); ?>
                </ul>
              </div>
             
            </div>
          </div>
         
            <div class="col-lg-9 order-1 order-lg-2">
            <?php
                    if (isset($data) && isset($data['posts']) && $data && $data['posts']) :
                    ?>
              <div class="row">
                <?php foreach ($data['posts'] as $item) : ?>
                  <div class="col-lg-6 col-sm-6">
                    <div class="blog-item">
                    <a href="/blogs/<?= htmlspecialchars($item['id']); ?>">
                      <div class="bi-pic">
                        <img src="<?= APP_URL ?>/public/assets/admin/img/<?= $item['img'] ?>" alt="">
                      </div>
                      <div class="bi-text">
                          <h4><?= $item['title'] ?></h4>
                        <p><?= $item['categories_post_name'] ?><span>- 19 Tháng 5, 2019</span></p>
                      </div>
                    </a>
                    </div>
                  </div>
                <?php endforeach; ?>



                <!-- <div class="col-lg-6 col-sm-6">
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
              </div> -->
                <!-- <div class="col-lg-12">
                <div class="loading-more">
                  <i class="icon_loading"></i>
                  <a href="#">
                    Tải thêm
                  </a>
                </div>
              </div> -->
              </div>
            <?php
          else :
            ?>
              <h4 class="text-center text-danger">Không có dữ liệu</h4>
            <?php
          endif;
            ?>
            </div>
        </div>
      </div>
    </section>
    <!-- Blog Section End -->



<?php

    }
}
