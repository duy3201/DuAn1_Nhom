<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class AuctionValidation
{
    public static function create()
    {
        $is_valid = true;

        if (empty($_POST['product_name'])) {
            $is_valid['product_name'] = 'Tên sản phẩm không được để trống.';
        }

        if (empty($_POST['starting_price'])) {
            $is_valid['starting_price'] = 'Giá khởi điểm không được để trống.';
        } elseif (!is_numeric($_POST['starting_price']) || $_POST['starting_price'] <= 0) {
            $is_valid['starting_price'] = 'Giá khởi điểm phải là số dương.';
        }

        if (empty($_POST['start_time'])) {
            $is_valid['start_time'] = 'Thời gian bắt đầu không được để trống.';
        } elseif (!strtotime($_POST['start_time'])) {
            $is_valid['start_time'] = 'Thời gian bắt đầu không hợp lệ.';
        }

        if (empty($_POST['status'])) {
            $is_valid['status'] = 'Trang thái không được để trống.';
        }

        if (empty($_POST['end_time'])) {
            $is_valid['end_time'] = 'Thời gian kết thúc không được để trống.';
        } elseif (!strtotime($_POST['end_time'])) {
            $is_valid['end_time'] = 'Thời gian kết thúc không hợp lệ.';
        }

        if (!empty($_POST['start_time']) && !empty($_POST['end_time']) && strtotime($_POST['start_time']) >= strtotime($_POST['end_time'])) {
            $is_valid['time_range'] = 'Thời gian bắt đầu phải trước thời gian kết thúc.';
        }

        return empty($errors) ? true : $errors;
    }

    public static function edit()
    {
        return self::create();
    }

    public static function uploadimg() {
        if (!isset($_FILES['img']) || $_FILES['img']['error'] !== UPLOAD_ERR_OK) {
            NotificationHelper::error('upload', 'Lỗi trong quá trình tải ảnh lên');
            return false;
        }

        // Nơi lưu hình ảnh
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/public/assets/admin/img/';

        // Kiểm tra loại file upload có hợp lệ không
        $imgFileType = strtolower(pathinfo(basename($_FILES['img']['name']), PATHINFO_EXTENSION));
        if (!in_array($imgFileType, ['jpg', 'png', 'jpeg', 'gif', 'webp'])) {
            NotificationHelper::error('type_upload', 'Chỉ nhận file ảnh JPG, PNG, JPEG, GIF, WEBP');
            return false;
        }

        // Thay đổi tên file thành dạng năm tháng ngày giờ phút giây
        $nameimg = date('YmdHis') . '.' . $imgFileType;

        // Đường dẫn đầy đủ để di chuyển file
        $target_file = $target_dir . $nameimg;

        // Kiểm tra và tạo thư mục nếu không tồn tại
        if (!is_dir($target_dir) && !mkdir($target_dir, 0777, true)) {
            NotificationHelper::error('dir_error', 'Không thể tạo thư mục lưu ảnh');
            return false;
        }

        // Di chuyển file đã tải lên đến thư mục đích
        if (!move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
            $error = error_get_last();
            NotificationHelper::error('move_upload', 'Không thể tải ảnh vào thư mục đã lưu. Chi tiết lỗi: ' . $error['message']);
            return false;
        }

        return $nameimg;
    }
}
