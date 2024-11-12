<?php

namespace App\Views\Client\Pages;

use App\Views\BaseView;

class CheckOut extends BaseView
{
    public static function render($data = null)
    {

?>
   <section class="checkout-section spad">
            <div class="container">
                <form action="#" class="checkout-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- <div class="checkout-content">
                                <a href="#" class="content-btn">Click Here To Login</a>
                            </div> -->
                            <h4>Chi tiết thanh toán</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="fir">Tên<span>*</span></label>
                                    <input type="text" id="fir">
                                </div>
                                <div class="col-lg-6">
                                    <label for="last">Họ<span>*</span></label>
                                    <input type="text" id="last">
                                </div>
                                <div class="col-lg-12">
                                    <label for="cun-name">Số điện thoại</label>
                                    <input type="text" id="cun-name">
                                </div>
                                <!-- <div class="col-lg-12">
                                    <label for="cun">Country<span>*</span></label>
                                    <input type="text" id="cun">
                                </div> -->
                                <div class="col-lg-12">
                                    <label for="street">Thành Phố<span>*</span></label>
                                    <input type="text" id="street" class="street-first">
                                    <!-- <input type="text"> -->
                                </div>
                                <!-- <div class="col-lg-12">
                                    <label for="zip">Postcode / ZIP (optional)</label>
                                    <input type="text" id="zip">
                                </div> -->
                                <div class="col-lg-12">
                                    <label for="town">Địa chỉ<span>*</span></label>
                                    <input type="text" id="town">
                                </div>
                                <div class="col-lg-12">
                                    <label for="email">Email <span>*</span></label>
                                    <input type="text" id="email">
                                </div>
                                <!-- <div class="col-lg-6">
                                    <label for="phone">Phone<span>*</span></label>
                                    <input type="text" id="phone">
                                </div> -->
                                <div class="col-lg-12">
                                    <div class="create-item">
                                        <label for="acc-create">
                                        Tạo tài khoản?
                                            <input type="checkbox" id="acc-create">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="checkout-content">
                                <input type="text" placeholder="Enter Your Coupon Code">
                            </div> -->
                            <div class="place-order m-5">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="order-total">
                                    <ul class="order-table">
                                        <li>Sản phẩm <span>Tổng cộng</span></li>
                                        <li class="fw-normal">Combination x 1 <span>250.000VNĐ</span></li>
                                        <li class="fw-normal">Combination x 1 <span>250.000VNĐ</span></li>
                                        <li class="fw-normal">Combination x 1 <span>250.000VNĐ</span></li>
                                        <!-- <li class="fw-normal">Tổng cộng <span>250.000VNĐ</span></li> -->
                                        <li class="total-price">Tổng cộng <span>750.000VNĐ</span></li>
                                    </ul>
                                    <div class="payment-check">
                                        <div class="pc-item">
                                            <label for="pc-check">
                                           Thanh toán khi nhận hàng
                                                <input type="checkbox" id="pc-check">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="pc-item">
                                            <label for="pc-paypal">
                                                Thẻ ATM nội địa / Internet Banking
                                                <input type="checkbox" id="pc-paypal">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="order-btn">
                                        <button type="submit" class="site-btn place-btn">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    <!-- Shopping Cart Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    }
}
?>