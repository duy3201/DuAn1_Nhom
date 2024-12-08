<?php
namespace App\Views\Client\Pages;

use App\Views\BaseView;

class PaymentFailed extends BaseView
{
    public static function render($data = null)
    {
?>
    <style>
        .container-failed {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .failed-icon {
            font-size: 80px;
            color: #dc3545;
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .order-details {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
            text-align: left;
        }

        .button-group {
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin: 0 10px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        @media (max-width: 600px) {
            .container-failed {
                margin: 20px;
            }
            
            .button-group {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
            
            .btn {
                margin: 5px 0;
            }
        }
    </style>
    <div class="container-failed">
        <i class="fas fa-times-circle failed-icon"></i>
        <h2>Rất tiếc, giao dịch không thành công!</h2>
        <p>Giao dịch thanh toán của bạn đã không thành công. Vui lòng thử lại hoặc liên hệ với chúng tôi để được hỗ trợ.</p>

        <div class="order-details">
            <h3 class="mb-3">Thông tin đơn hàng</h3>
            <p><strong>Mã đơn hàng:</strong> <span id="orderNumber">#<?= rand(10000, 99999) ?></span></p>
            <p><strong>Ngày đặt hàng:</strong> <span id="orderDate"><?= date('d/m/Y H:i') ?></span></p>
            <p><strong>Phương thức thanh toán:</strong> <span id="paymentMethod">VNPAY</span></p>
            <p><strong>Trạng thái:</strong> <span style="color: #dc3545;">Thanh toán thất bại</span></p>
        </div>

        <p>Chúng tôi khuyên bạn kiểm tra lại thông tin thanh toán hoặc thử phương thức thanh toán khác.</p>
        
        <div class="button-group">
            <a href="/CheckOut" class="btn btn-primary">Quay lại trang đặt hàng</a>
            <a href="/cart" class="btn btn-secondary">Xem giỏ hàng</a>
        </div>
    </div>
<?php
    }
}
