<?php

namespace App\Controllers\Client;

use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Cart;

class CartController
{
    public function addToCart()
    {
        $productId = $_POST['id_product'];
        $price = $_POST['price'];
        $quantity = intval($_POST['quantity']);

        // Lấy giỏ hàng từ cookie
        $cart = isset($_COOKIE['carts_detail']) ? json_decode($_COOKIE['carts_detail'], true) : [];

        // Kiểm tra nếu sản phẩm đã có trong giỏ
        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }

        // Cập nhật cookie
        setcookie('carts_detail', json_encode($cart), time() + (86400 * 30), "/"); // 30 ngày

        header('Location: ' .$_SERVER['HTTP_REFERER']);
        exit;
    }



    public function viewCart()
    {
        $cartItems = isset($_COOKIE['carts_detail']) ? json_decode($_COOKIE['carts_detail'], true) : [];
        // Hiển thị trang giỏ hàng
        Header::render();
        Cart::render($cartItems);
        Footer::render();
    }
    public function removeFromCart()
    {
        $productId = $_POST['id_product'];

        $cart = isset($_COOKIE['carts_detail']) ? json_decode($_COOKIE['carts_detail'], true) : [];
        unset($cart[$productId]);

        setcookie('carts_detail', json_encode($cart), time() + (86400 * 30), "/");

        header('Location: /cart');
        exit;
    }
}
