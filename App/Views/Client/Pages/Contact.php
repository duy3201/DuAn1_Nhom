<?php

namespace App\Views\Client\Pages;

use App\Views\BaseView;

class Contact extends BaseView
{
  public static function render($data = null)
  {
?>

    <!-- Bắt Đầu Phần Breadcrumb -->
    <div class="breacrumb-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="breadcrumb-text">
              <a href="/"><i class="fa fa-home"></i> Trang Chủ</a>
              <span>Liên Hệ</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Kết Thúc Phần Breadcrumb -->

    <!-- Bắt Đầu Phần Bản Đồ -->
    <div class="map spad">
      <div class="container">
        <div class="map-inner">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48158.305462977965!2d-74.13283844036356!3d41.02757295168286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2e440473470d7%3A0xcaf503ca2ee57958!2sSaddle%20River%2C%20NJ%2007458%2C%20USA!5e0!3m2!1svi!2sbd!4v1575917275626!5m2!1svi!2sbd"
            height="610" style="border:0" allowfullscreen="">
          </iframe>
          <div class="icon">
            <i class="fa fa-map-marker"></i>
          </div>
        </div>
      </div>
    </div>
    <!-- Kết Thúc Phần Bản Đồ -->

    <!-- Bắt Đầu Phần Liên Hệ -->
    <section class="contact-section spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <div class="contact-title">
              <h4>Liên Hệ Chúng Tôi</h4>
              <p>Trái ngược với suy nghĩ phổ biến, Lorem Ipsum chỉ là đoạn văn bản ngẫu nhiên. Nó có nguồn gốc từ một tác phẩm văn học cổ điển của La Mã từ năm 45 TCN, hơn 2000 năm tuổi.</p>
            </div>
            <div class="contact-widget">
              <div class="cw-item">
                <div class="ci-icon">
                  <i class="ti-location-pin"></i>
                </div>
                <div class="ci-text">
                  <span>Địa Chỉ:</span>
                  <p>Cái Răng, Cần Thơ</p>
                </div>
              </div>
              <div class="cw-item">
                <div class="ci-icon">
                  <i class="ti-mobile"></i>
                </div>
                <div class="ci-text">
                  <span>Điện Thoại:</span>
                  <p>+84 949.618.552</p>
                </div>
              </div>
              <div class="cw-item">
                <div class="ci-icon">
                  <i class="ti-email"></i>
                </div>
                <div class="ci-text">
                  <span>Email:</span>
                  <p>oldstyle@gmail.com</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 offset-lg-1">
            <div class="contact-form">
              <div class="leave-comment">
                <h4>Để Lại Lời Nhắn</h4>
                <p>Nhân viên của chúng tôi sẽ gọi lại sau và trả lời câu hỏi của bạn.</p>
                <form method="post" id="contactForm" name="contactForm" class="contactForm " action="">
											<input type="hidden" name="method" value="POST">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group border-success">
														<label class="label " for="name">Họ và tên</label>
														<input type="text" class="form-control" name="name" id="name" placeholder="Họ và tên">
													</div>
												</div>
												<div class="col-md-6"> 
													<div class="form-group">
														<label class="label" for="email">Địa chỉ email</label>
														<input type="text" class="form-control" name="email" id="email" placeholder="Địa chỉ email">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="phone">Số điện thoại</label>
														<input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại của bạn">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="message">Nội dung</label>
														<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Nội dung liên hệ"></textarea>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<button class="btn btn-warning d-grid w-100" type="submit">Gửi</button>
														<div class="submitting"></div>
													</div>
												</div>
											</div>
										</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Kết Thúc Phần Liên Hệ -->

<?php
  }
}
?>