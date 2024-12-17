<?php

namespace App\Controllers\Admin;

use App\Models\OrderModel;
use App\Views\Admin\Pages\Orders\Index;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Orders\Detail;

class OrderController
{
    // Hiển thị danh sách đơn hàng
    public static function index()
    {
        $order = new OrderModel();
        $data = $order->getAllOrders(); // Lấy tất cả đơn hàng từ model

        // Render Header và Footer
        Header::render();
        Notification::render(); // Hiển thị thông báo (nếu có)
        
        // Hiển thị danh sách đơn hàng
        Index::render($data);

        // Render Footer
        Footer::render();
    }
    // Lấy chi tiết đơn hàng
    public static function detail($id)
    {
      
        $oders = new OrderModel();
        $orders= $oders->getOneOrderDetail($id);
        $orders_detail= $oders->getOrderDetail($id);
      
        // $product_detail = $product->getOneProductByStatus($id);

        // $product_quality = $product->getOneProductByQuality($id);
    
            // if (!$product_detail) {
            //     NotificationHelper::error('product_detail', 'Không thể xem sản phẩm này');
            //     header('location: /products');
            //     exit;
            // }
    
           
    
            $data = [
                'orders' => $orders,
                'orders_detail' => $orders_detail,
            ];
    
            Header::render($data);
            // Notification::render();
            // NotificationHelper::unset();
            Detail::render($data);
            Footer::render();
    }
    
}
