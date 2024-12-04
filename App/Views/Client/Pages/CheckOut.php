<?php
namespace App\Views\Client\Pages;

use App\Models\Product;
use App\Views\BaseView;

class CheckOut extends BaseView
{
    public static function render($data = null)
    {
        // Lấy thông tin giỏ hàng từ cookie
        $cartItems = isset($_COOKIE['carts_detail']) ? json_decode($_COOKIE['carts_detail'], true) : [];
        $total = 0;
        
        // Tạo id_order ngẫu nhiên
        $orderId = random_int(1,10000);
        
?>
        <section class="checkout-section spad">
            <div class="container">
                <form action="/order/create" method="POST" id="checkoutForm" class="checkout-form">
                    <input type="hidden" name="method" value="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>Chi tiết thanh toán</h4>
                            <div class="row">
                            <div class="col-lg-12" style="display: none;">
                                    <label for="id_user">Tên<span>*</span></label>
                                    <input type="text" id="id_user" name="id_user" value="<?= $_COOKIE['id_user']?>">
                                </div>
                                <div class="col-lg-12" style="display: none;">
                                    <label for="orderId"></label>
                                    <input type="text" id="orderId" name="orderId" value="<?= $orderId?>">
                                </div>
                                <div class="col-lg-12">
                                    <label for="sub_name">Tên<span>*</span></label>
                                    <input type="text" id="sub_name" name="sub_name" required>
                                </div>
                                <div class="col-lg-12">
                                    <label for="sub_tel">Số điện thoại</label>
                                    <input type="text" id="sub_tel" name="sub_tel" required>
                                </div>
                                <div class="col-lg-12">
                                    <label for="city">Tỉnh/Thành phố<span>*</span></label>
                                    <select class="form-select" id="city" name="city" required>
                                        <option value="">Chọn tỉnh thành</option>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <label for="district">Quận/Huyện<span>*</span></label>
                                    <select class="form-select" id="district" name="district" required>
                                        <option value="">Chọn quận huyện</option>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <label for="ward">Phường/Xã<span>*</span></label>
                                    <select class="form-select" id="ward" name="ward" required>
                                        <option value="">Chọn phường xã</option>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <label for="address">Địa chỉ cụ thể<span>*</span></label>
                                    <input type="text" id="address" name="address" required>
                                </div>
                                <div class="col-lg-12">
                                    <label for="email">Email <span>*</span></label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                                <div class="col-4">
                                    <a href="/register" class="text-danger">Tạo tài khoản?</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="place-order mx-5">
                                <?php if (!empty($cartItems)): ?>
                                    <h4>Đơn hàng của bạn</h4>
                                    <div class="order-total mt-5">
                                        <ul class="order-table">
                                            <li>Sản phẩm <span>Tổng cộng</span></li>
                                            <?php foreach ($cartItems as $productId => $quantity): 
                                                $productModel = new Product();
                                                $product = $productModel->getOneProductByStatus($productId);
                                                
                                                if (!$product) continue;
                                                
                                                $totalItemPrice = $quantity * $product['product_price'];
                                                $total += $totalItemPrice;
                                            ?>
                                                <li class="fw-normal">
                                                    <?= htmlspecialchars($product['name']); ?> x <?= $quantity; ?>
                                                    <span><?= number_format($totalItemPrice, 0, ',', '.') . ' VNĐ'; ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                            <li class="total-price">Tổng cộng <span><?= number_format($total, 0, ',', '.') . ' VNĐ'; ?></span></li>
                                        </ul>
                                    <?php else: ?>
                                        <p class="text-center">Giỏ hàng của bạn đang trống. <a href="/products">Tiếp tục mua sắm</a></p>
                                    <?php endif; ?>

                                    <input type="hidden" name="amount" value="<?php echo $total; ?>">

                                    <h4 class="text-center mt-4">Phương thức thanh toán</h4>
                                    <div class="payment-check m-4">
                                        <div class="pc-item">
                                            <label for="payment_cod">
                                                <input type="radio" id="payment_cod" name="payment_method" value="cod" checked>
                                                <span class="checkmark"></span>
                                                Thanh toán khi nhận hàng
                                            </label>
                                        </div>

                                        <div class="pc-item">
                                            <label for="payment_vnpay">
                                                <input type="radio" id="payment_vnpay" name="payment_method" value="vnpay">
                                                <span class="checkmark"></span>
                                                Thanh toán qua VNPAY
                                            </label>
                                        </div>

                                        <!-- VNPAY Bank selection (hiển thị khi chọn VNPAY) -->
                                        <div id="vnpay_banks" style="display: none;" class="mt-3">
                                            <label for="bank_code">Chọn ngân hàng:</label>
                                            <select name="bank_code" id="bank_code" class="form-select">
                                                <option value="">Chọn ngân hàng</option>
                                                <option value="NCB">NCB</option>
                                                <option value="VIETCOMBANK">Vietcombank</option>
                                                <option value="TECHCOMBANK">Techcombank</option>
                                                <option value="BIDV">BIDV</option>
                                                <option value="AGRIBANK">Agribank</option>
                                                <option value="MBBANK">MB Bank</option>
                                                <option value="ACB">ACB</option>
                                                <option value="VPBANK">VPBank</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center order-btn m-4">
                                        <button type="submit" class="site-btn place-btn" name="redirect">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
        <script>
            // Xử lý địa chỉ
            var citis = document.getElementById("city");
            var districts = document.getElementById("district");
            var wards = document.getElementById("ward");
            
            var Parameter = {
                url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
                method: "GET",
                responseType: "application/json",
            };
            
            axios(Parameter).then(function(result) {
                renderCity(result.data);
            });

            function renderCity(data) {
                for (const x of data) {
                    citis.options[citis.options.length] = new Option(x.Name, x.Id);
                }
                
                citis.onchange = function() {
                    district.length = 1;
                    ward.length = 1;
                    if (this.value != "") {
                        const result = data.filter(n => n.Id === this.value);
                        for (const k of result[0].Districts) {
                            district.options[district.options.length] = new Option(k.Name, k.Id);
                        }
                    }
                };
                
                district.onchange = function() {
                    ward.length = 1;
                    const dataCity = data.filter((n) => n.Id === citis.value);
                    if (this.value != "") {
                        const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;
                        for (const w of dataWards) {
                            wards.options[wards.options.length] = new Option(w.Name, w.Id);
                        }
                    }
                };
            }

            // Xử lý hiển thị lựa chọn ngân hàng VNPAY
            document.querySelectorAll('input[name="payment_method"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    const vnpayBanks = document.getElementById('vnpay_banks');
                    if (this.value === 'vnpay') {
                        vnpayBanks.style.display = 'block';
                    } else {
                        vnpayBanks.style.display = 'none';
                    }
                });
            });

            // // Xử lý form submit
            // document.getElementById('checkoutForm').addEventListener('submit', function(e) {
            //     e.preventDefault();
                
            //     const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            //     const formData = new FormData(this);

            //     if (paymentMethod === 'vnpay') {
            //         // Gửi đến endpoint xử lý thanh toán VNPAY
            //         fetch('/payment/create', {
            //             method: 'POST',
            //             body: formData
            //         })
            //         .then(response => response.json())
            //         .then(data => {
            //             if (data.redirectUrl) {
            //                 window.location.href = data.redirectUrl;
            //             }
            //         })
            //         .catch(error => {
            //             console.error('Error:', error);
            //             alert('Có lỗi xảy ra khi xử lý thanh toán');
            //         });
            //     } else {
            //         // Xử lý đặt hàng COD
            //         this.submit();
            //     }
            // });
        </script>
<?php
    }
}
?>