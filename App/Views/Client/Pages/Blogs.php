<?php

namespace App\Views\Client\Pages;

use App\Views\BaseView;

class Blogs extends BaseView
{
  public static function render($data = null)
  {
?>




    <style>
      .card-img-top {
        object-fit: cover;
        height: 250px;
      }

      .card-body {
        padding: 20px;
      }

      .card-title {
        font-size: 1.75rem;
        font-weight: bold;
        color: #333;
      }

      .card-text {
        font-size: 1.1rem;
        color: #555;
        line-height: 1.5;
        height: 80px;
        overflow: hidden;
      }

      .card-footer {
        background-color: #f8f9fa;
        text-align: right;
        padding: 10px;
        font-size: 0.9rem;
        color: #999;
      }

      .card:hover {
        transform: translateY(-10px);
        transition: transform 0.3s ease-in-out;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      }

      .card-deck .card {
        border: none;
        border-radius: 10px;
      }

      .pagination {
        justify-content: center;
      }
    </style>
    

   

      <!-- Hero Section -->

      <div class="container">
        <h1 class="text-center">Trang Tin Tức </h1>
      </div>


      <!-- News Section -->
      <div class="container py-5">
        <div class="row">

          <!-- News Article 1 -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm">
              <img src="/public/img/ao-thun-couple-gucci.jpg" class="card-img-top" alt="Tin tức 1">
              <div class="card-body">
                <h5 class="card-title">Tiêu đề bài viết 1</h5>
                <p class="card-text">Đoạn giới thiệu ngắn về bài viết 1. Nội dung sẽ được tóm tắt để thu hút sự chú ý của người đọc. Đọc tiếp để biết thêm chi tiết...</p>
              </div>
              <div class="card-footer text-muted">
                <small>Ngày đăng: 08/11/2024</small>
              </div>
            </div>
          </div>

          <!-- News Article 2 -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm">
              <img src="/public/img/ao-thun-couple-gucci.jpg" class="card-img-top" alt="Tin tức 2">
              <div class="card-body">
                <h5 class="card-title">Tiêu đề bài viết 2</h5> khác để cập nhật các tin tức mới. Nội dung sẽ được giới thiệu với cái nhìn tổng quan để lôi kéo người đọc tìm hiểu thêm.</p>
              </div>
              <div class="card-footer text-muted">
                <small>Ngày đăng: 07/11/2024</small>
              </div>
            </div>
          </div>

          <!-- News Article 3 -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm">
              <img src="/public/img/ao-thun-couple-gucci.jpg" class="card-img-top" alt="Tin tức 3">
              <div class="card-body">
                <h5 class="card-title">Tiêu đề bài viết 3</h5>
                <p class="card-text">Đoạn tóm tắt bài viết, cung cấp những thông tin cơ bản về nội dung, mục đích và điểm nổi bật của bài viết. Khuyến khích người đọc bấm vào để xem chi tiết.</p>
              </div>
              <div class="card-footer text-muted">
                <small>Ngày đăng: 06/11/2024</small>
              </div>
            </div>
          </div>

          <!-- News Article 4 -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm">
              <img src="/public/img/ao-thun-couple-gucci.jpg" class="card-img-top" alt="Tin tức 4">
              <div class="card-body">
                <h5 class="card-title">Tiêu đề bài viết 4</h5>
                <p class="card-text">Cập nhật mới về xu hướng và những thay đổi trong ngành. Bài viết này giúp người đọc nắm bắt các thay đổi nhanh chóng và dễ dàng.</p>
              </div>
              <div class="card-footer text-muted">
                <small>Ngày đăng: 05/11/2024</small>
              </div>
            </div>
          </div>

          <!-- News Article 5 -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm">
              <img src="/public/img/ao-thun-couple-gucci.jpg" class="card-img-top" alt="Tin tức 5">
              <div class="card-body">
                <h5 class="card-title">Tiêu đề bài viết 5</h5>
                <p class="card-text">Một bài viết mới về các sự kiện nổi bật trong tuần, với nhiều hình ảnh minh họa và thông tin chi tiết hấp dẫn.</p>
              </div>
              <div class="card-footer text-muted">
                <small>Ngày đăng: 04/11/2024</small>
              </div>
            </div>
          </div>

          <!-- News Article 6 -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm">
              <img src="/public/img/ao-thun-couple-gucci.jpg" class="card-img-top" alt="Tin tức 6">
              <div class="card-body">
                <h5 class="card-title">Tiêu đề bài viết 6</h5>/-strong/-heart:>:o:-((:-h <p class="card-text">Tin tức nóng hổi về một sự kiện đặc biệt vừa diễn ra. Nội dung bài viết cung cấp cái nhìn sâu sắc về diễn biến sự kiện này.</p>
              </div>
              <div class="card-footer text-muted">
                <small>Ngày đăng: 03/11/2024</small>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Pagination -->
      <nav aria-label="Page navigation example" class="container py-3">
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>



      <!-- Bootstrap JS -->


  <?php
  }
}
  ?>