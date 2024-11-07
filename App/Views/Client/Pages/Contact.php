<?php

namespace App\Views\Client\Pages;

use App\Views\BaseView;

class Contact extends BaseView
{
    public static function render($data = null)
    {
?>

<div class="contact">
        <header class="bg-white text-dark text-center py-4">
    <h1 class="mb-0">Liên Hệ Chúng Tôi</h1>
    <p class="lead">Cửa hàng đồ second-hand chất lượng, giá hợp lý</p>
  </header>
        <section class="container-map">
    <div class="row">
      <div class="col-12 p-0">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3555.920832713923!2d105.75565247450827!3d9.982086773343747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08906415c355f%3A0x416815a99ebd841e!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e1!3m2!1svi!2s!4v1730996964015!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
      </section>

  <section class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4">Gửi tin nhắn cho chúng tôi</h2>
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Tên của bạn</label>
            <input type="text" class="form-control" id="name" placeholder="Nhập tên của bạn" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Nhập email của bạn" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Lời nhắn</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Nhập nội dung..." required></textarea>
          </div>
          <button type="submit" class="btn btn-primary w-100">Gửi Liên Hệ</button>
        </form>
      </div>
      <div class="col-md-6 text-center">
        <h2 class="mb-4">Thông Tin Liên Hệ</h2>
        <p><strong>Địa chỉ:</strong> 123 Đường ABC, Quận 1, TP. HCM</p>
        <p><strong>Email:</strong> lienhe@secondhandstore.vn</p>
        <p><strong>Số điện thoại:</strong> 0909 123 456</p>
        <p><strong>Giờ mở cửa:</strong> 9:00 - 21:00 (Thứ Hai - Chủ Nhật)</p>
      </div>
    </div>
  </section>

        </div>
        
<?php
    }

}
?>
