<?php

namespace App\Models;

class CartModel
{
    // Lấy tất cả sản phẩm từ giỏ hàng (cookie)
    public function getAllCartItems()
    {
        return isset($_COOKIE['carts_detail']) ? json_decode($_COOKIE['carts_detail'], true) : [];
    }

    // Lấy thông tin một sản phẩm trong giỏ hàng theo ID
    public function getCartItem($productId)
    {
        $cartData = $this->getAllCartItems();

        foreach ($cartData as $item) {
            if ($item['id_product'] == $productId) {
                return $item;
            }
        }

        return null;
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($data)
    {
        $cartData = $this->getAllCartItems();

        // Kiểm tra nếu sản phẩm đã tồn tại
        $exists = false;
        foreach ($cartData as &$item) {
            if ($item['id_product'] == $data['id_product']) {
                $item['quantity'] += $data['quantity'];
                $exists = true;
                break;
            }
        }

        // Nếu sản phẩm chưa tồn tại, thêm mới
        if (!$exists) {
            $cartData[] = $data;
        }

        // Cập nhật cookie
        setcookie('carts_detail', json_encode($cartData), time() + (86400 * 30), "/");

        return true;
    }

    // Cập nhật sản phẩm trong giỏ hàng
    public function updateCartItem($productId, $data)
    {
        $cartData = $this->getAllCartItems();

        foreach ($cartData as &$item) {
            if ($item['id_product'] == $productId) {
                $item = array_merge($item, $data);
                break;
            }
        }

        // Cập nhật cookie
        setcookie('carts_detail', json_encode($cartData), time() + (86400 * 30), "/");

        return true;
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function deleteCartItem($productId)
    {
        $cartData = $this->getAllCartItems();

        $cartData = array_filter($cartData, function ($item) use ($productId) {
            return $item['id_product'] != $productId;
        });

        // Cập nhật cookie
        setcookie('carts_detail', json_encode(array_values($cartData)), time() + (86400 * 30), "/");

        return true;
    }

    // Xóa toàn bộ giỏ hàng
    public function clearCart()
    {
        setcookie('carts_detail', '', time() - 3600, "/"); // Xóa cookie
        return true;
    }

    // Lấy thông tin sản phẩm từ ID (dùng để lấy chi tiết từ cơ sở dữ liệu nếu cần)
    public function getProductById($productId)
    {
        $productModel = new Product();
        return $productModel->getOne($productId);
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
    public function updateCart()
    {
        $productId = $_POST['id_product'];
        $quantity = intval($_POST['quantity']);

        $cart = isset($_COOKIE['carts_detail']) ? json_decode($_COOKIE['carts_detail'], true) : [];

        if ($quantity > 0) {
            $cart[$productId] = $quantity;
        } else {
            unset($cart[$productId]); // Xóa sản phẩm nếu số lượng <= 0
        }

        setcookie('carts_detail', json_encode($cart), time() + (86400 * 30), "/");

        header('Location: /cart');
        exit;
    }
}
