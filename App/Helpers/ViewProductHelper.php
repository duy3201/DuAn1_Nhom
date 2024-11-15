<?php

namespace App\Helpers;

use App\Models\Product;

class ViewProductHelper
{
//     public static function cookieView($id, $view)
//     {
//         // Lấy dữ liệu lượt xem hiện tại từ cookie
//         $view_data = isset($_COOKIE['view']) ? json_decode($_COOKIE['view'], true) : [];

//         // Kiểm tra xem dữ liệu có tồn tại và có chứa khóa 'product_id' hay không
//         $product_id_arr = array_column($view_data, 'id');

//         // Kiểm tra xem product_id có tồn tại trong cookie view hay chưa
//         if (in_array($id, $product_id_arr)) {
//             foreach ($view_data as $key => $value) {
//                 if (isset($view_data[$key]['id']) && $view_data[$key]['id'] == $id) {
//                     // Nếu thời gian xem lần trước cách đây hơn 1 phút thì tăng lượt xem
//                     if ($view_data[$key]['time'] < time() - 60) {
//                         $view++;
//                     }
//                     // Cập nhật thời gian xem mới
//                     $view_data[$key]['time'] = time();
//                 }
//             }
//         } else {
//             // Nếu chưa có thì thêm vào cookie view
//             $product_array = [
//                 'id' => $id,
//                 'time' => time()
//             ];
//             $view++;
//             $view_data[] = $product_array;
//         }

//         // Chuyển array thành string để lưu vào cookie view
//         $product_data = json_encode($view_data);

//         // Lưu cookie
//         setcookie('view', $product_data, time() + 3600 * 24 * 30 * 12, '/');
//         return self::updateView($id, $view);
//     }

//     public static function updateView($id, $view)
//     {
//         $product = new Product();
//         $data = [
//             'view' => $view
//         ];

//         // Giả sử updateProduct là một phương thức của model Product để cập nhật cơ sở dữ liệu
//         $result = $product->updateProduct($id, $data);

//         return $result; // Trả về kết quả cập nhật
//     }
}
