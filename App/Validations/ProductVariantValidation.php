<?php


namespace App\Validations;

use App\Helpers\NotificationHelper;

class ProductVariantValidation {
    public static function create() : bool {
        $is_valid = true;

        //Tên loại
        if (!isset($_POST['label']) || $_POST['label'] === '') {
            NotificationHelper::error('label', 'Không để trống tên biến thể');
            $is_valid = false;
        }

        //giá tiền
        if (!isset($_POST['price']) || $_POST['price'] === '') {
            NotificationHelper::error('price', 'Không để trống giá tiền');
            $is_valid = false;
        } elseif((int) $_POST['price'] <= 0){
            NotificationHelper::error('price', 'Giá tiền phải lớn hơn 0');
            $is_valid = false;
        }

        //id biến thể
        if (!isset($_POST['id_product']) || $_POST['id_product'] === '') {
            NotificationHelper::error('id_product', 'Không để trống loại biến thể');
            $is_valid = false;
        }

        //Số lượng
        if (!isset($_POST['quanlity']) || $_POST['quanlity'] === '') {
            NotificationHelper::error('quanlity', 'Không để trống trạng thái');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function edit() : bool {
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

