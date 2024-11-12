<?php

namespace App\Views\Client\Pages;

use App\Views\BaseView;

class Card extends BaseView
{
    public static function render($data = null)
    {

?>

        <!-- Bắt đầu phần giỏ hàng -->
        <section class="shopping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th class="p-name">Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng cộng</th>
                                        <th><i class="ti-close"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cart-pic first-row"><img src="/public/assets/client/img/cart-page/product-1.jpg" alt=""></td>
                                        <td class="cart-title first-row">
                                            <h5>Dứa Tươi</h5>
                                        </td>
                                        <td class="p-price first-row">60.000 VNĐ</td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row">60.000 VNĐ</td>
                                        <td class="close-td first-row"><i class="ti-close"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="cart-pic"><img src="/public/assets/client/img/cart-page/product-2.jpg" alt=""></td>
                                        <td class="cart-title">
                                            <h5>Tôm Hùm Mỹ</h5>
                                        </td>
                                        <td class="p-price">60.000 VNĐ</td>
                                        <td class="qua-col">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price">60.000 VNĐ</td>
                                        <td class="close-td"><i class="ti-close"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="cart-pic"><img src="/public/assets/client/img/cart-page/product-3.jpg" alt=""></td>
                                        <td class="cart-title">
                                            <h5>Áo Len Quảng Châu</h5>
                                        </td>
                                        <td class="p-price">60.000 VNĐ</td>
                                        <td class="qua-col">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price">60.000 VNĐ</td>
                                        <td class="close-td"><i class="ti-close"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 offset-lg-4">
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="subtotal">Tạm tính <span>240.000 VNĐ</span></li>
                                        <li class="cart-total">Tổng cộng <span>240.000 VNĐ</span></li>
                                    </ul>
                                    <a href="#" class="proceed-btn">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Kết thúc phần giỏ hàng -->

<?php
    }
}
?>
