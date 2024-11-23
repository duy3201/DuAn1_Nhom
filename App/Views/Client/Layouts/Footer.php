<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
    public static function render($data = null)
    { ?>
        <!-- Phần Footer Bắt Đầu -->
        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-left">
                            <div class="footer-logo">
                                <a href="#"><img src="/public/assets/client/img/logo2.png" alt="Logo"></a>
                            </div>
                            <ul>
                                <li>Địa chỉ: Cái Răng, Cần Thơ</li>
                                <li>Điện thoại: 0949618553</li>
                                <li>Email: oldstyle@gmail.com</li>
                            </ul>
                            <div class="footer-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-1">
                        <div class="footer-widget">
                            <h5>Thông Tin</h5>
                            <ul>
                                <li><a href="#">Về Chúng Tôi</a></li>
                                <li><a href="#">Thanh Toán</a></li>
                                <li><a href="#">Liên Hệ</a></li>
                                <li><a href="#">Dịch Vụ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-widget">
                            <h5>Tài Khoản</h5>
                            <ul>
                                <li><a href="#">Tài Khoản Của Tôi</a></li>
                                <li><a href="#">Liên Hệ</a></li>
                                <li><a href="#">Giỏ Hàng</a></li>
                                <li><a href="#">Cửa Hàng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="newslatter-item">
                            <h5>Tham Gia Bản Tin Của Chúng Tôi</h5>
                            <p>Nhận cập nhật qua email về cửa hàng và các ưu đãi đặc biệt của chúng tôi.</p>
                            <form action="#" class="subscribe-form">
                                <input type="text" placeholder="Nhập Email của bạn">
                                <button type="button">Đăng Ký</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-reserved">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright-text">
                                <!-- Link về Colorlib không được xóa. Template được cấp phép theo CC BY 3.0. -->
                                Bản quyền &copy;<script>document.write(new Date().getFullYear());</script> Tất cả các quyền được bảo lưu | Được thực hiện với bởi nhóm dự án 1 old style và<a href="https://colorlib.com" target="_blank"> Colorlib</a>
                                <!-- Link về Colorlib không được xóa. Template được cấp phép theo CC BY 3.0. -->
                            </div>
                            <div class="payment-pic">
                                <img src="/public/assets/client/img/payment-method.png" alt="Phương thức thanh toán">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="/public/assets/client/js/jquery-3.3.1.min.js"></script>
        <script src="/public/assets/client/js/bootstrap.min.js"></script>
        <script src="/public/assets/client/js/jquery-ui.min.js"></script>
        <script src="/public/assets/client/js/jquery.countdown.min.js"></script>
        <script src="/public/assets/client/js/jquery.nice-select.min.js"></script>
        <script src="/public/assets/client/js/jquery.zoom.min.js"></script>
        <script src="/public/assets/client/js/jquery.dd.min.js"></script>
        <script src="/public/assets/client/js/jquery.slicknav.js"></script>
        <!-- <script src="/public/assets/client/js/owl.carousel.min.js"></script> -->
        <script src="/public/assets/client/js/main.js"></script>
    </body>

    </html>
<?php }
}
