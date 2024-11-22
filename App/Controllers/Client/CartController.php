<?php

namespace App\Controllers\Client;

class CartController
{
    public static function addToCart()
    {
        // Khởi động session nếu chưa được khởi động
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Lấy thông tin sản phẩm từ request (POST hoặc GET)
        $productId = $_POST['product_id'] ?? null;
        $productName = $_POST['product_name'] ?? null;
        $productPrice = $_POST['product_price'] ?? null;
        $quantity = $_POST['quantity'] ?? 1;

        // Kiểm tra nếu dữ liệu sản phẩm hợp lệ
        if (!$productId || !$productName || !$productPrice) {
            $_SESSION['cart_message'] = 'Dữ liệu sản phẩm không hợp lệ!';
            header('Location: /products');
            exit();
        }

        // Tạo mảng giỏ hàng nếu chưa tồn tại
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($_SESSION['cart'][$productId])) {
            // Nếu có, tăng số lượng
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            // Nếu chưa, thêm sản phẩm mới
            $_SESSION['cart'][$productId] = [
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => $quantity,
            ];
        }

        // Thông báo và chuyển hướng về trang giỏ hàng
        $_SESSION['cart_message'] = 'Sản phẩm đã được thêm vào giỏ hàng!';
        header('Location: /cart');
        exit();
    }

    public static function viewCart()
    {
        // Lấy giỏ hàng từ session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $cart = $_SESSION['cart'] ?? [];
        include '../../Views/Client/Pages/Cart/index.php'; // Hiển thị giao diện giỏ hàng
    }
    

    public static function removeFromCart($productId)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Xóa sản phẩm khỏi giỏ hàng
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }

        // Thông báo và chuyển hướng
        $_SESSION['cart_message'] = 'Sản phẩm đã được xóa khỏi giỏ hàng!';
        header('Location: /cart');
        exit();
    }
}
