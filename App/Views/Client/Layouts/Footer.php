<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{

     public static function render($data = null)
     { ?>
          <footer>
            <div class="footer1">
                Logo
                <p>Nâng tầm phong cách với quần áo chất lượng, giá hợp lý, và mỗi món đồ đều mang một câu chuyện riêng biệt.</p>
            </div>
            <hr>
            <div class="container-footer text-center footer2">
                <div class="row">
                    <div class="col">
                        <h4>Về chúng tôi</h4>
                        <nav></nav>
                        <a href="#">Tổng quan cửa hàng</a>
                        <a href="#">Tìm kiếm sản phẩm</a>
                        <a href="#">Lịch sử cửa hàng</a>
                        <a href="#">Tín tức mới nhất</a>
                    </div>
                    <div class="col">
                        <h4>Chính sách</h4>
                        <nav></nav>
                        <a href="#">Chính sách đổi trả</a>
                        <a href="#">Chính sách khuyến mãi</a>
                        <a href="#">Chính sách bảo mật</a>
                        <a href="#">Chính sách giao hàng</a>
                    </div>
                    <div class="col">
                        <h4>Liên hệ</h4>
                        <nav></nav>
                        <a href="#"><i class="fa-solid fa-envelope"></i> : nguyenvanla@gmail.com</a>
                        <a href="#"><i class="fa-solid fa-phone"></i> : 0329396779</a>
                        <a href="#"><i class="fa-solid fa-location-dot"></i> : Đường số 22, Thường Thạnh, Cái Răng, Cần Thơ</a>
                    </div>
                    <div class="col">
                        <h4>Liên kết</h4>
                        <nav></nav>
                        <div class="icon-links">
                            <a href="#"><img src="/public/img/fb.png" alt=""></a>
                            <a href="#"><img src="/public/img/tt.png" alt=""></a>
                            <a href="#"><img src="/public/img/insta.png" alt=""></a>
                            <a href="#"><img src="/public/img/youtube.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-footer3 ">
                <div class="row justify-content-between">
                    <div class="col-4 title">
                        Thiết kế bởi team Old Style
                    </div>
                    <div class="col-4 icon-footer">
                        <a href="#"><img src="/public/img/Visa.png" alt=""></a>
                        <a href="#"><img src="/public/img/Mastercard.png" alt=""></a>
                        <a href="#"><img src="/public/img/GooglePay.png" alt=""></a>
                        <a href="#"><img src="/public/img/PayPal.png" alt=""></a>
                        <a href="#"><img src="/public/img/ApplePay.png" alt=""></a>
                    </div>
                </div>
            </div>
            </div>
        </footer>
<?php }
}
