<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class AuctionValidation
{

    public static function create() : bool {
        $is_valid = true;

        //id loại sản phẩm
        if (!isset($_POST['product_id']) || $_POST['product_id'] === '') {
            NotificationHelper::error('product_id', 'Không để trống giá khởi điểm');
            $is_valid = false;
        }

        //id loại sản phẩm
        if (!isset($_POST['starting_price']) || $_POST['starting_price'] === '') {
            NotificationHelper::error('starting_price', 'Không để trống giá khởi điểm');
            $is_valid = false;
        }

        //Người thêm
        if (!isset($_POST['start_time']) || $_POST['start_time'] === '') {
            NotificationHelper::error('start_time', 'Không để trống thời gian bắt đầu');
            $is_valid = false;
        }

        //nổi bậc
        if (!isset($_POST['end_time']) || $_POST['end_time'] === '') {
            NotificationHelper::error('end_time', 'Không để trống thời gian kết thúc');
            $is_valid = false;
        }

        //trạng thái
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống trạng thái');
            $is_valid = false;
        }

        if (!isset($_POST['start_time']) && !isset($_POST['end_time']) && strtotime($_POST['start_time']) >= strtotime($_POST['end_time'])) {
            $is_valid['time_range'] = 'Thời gian bắt đầu phải trước thời gian kết thúc.';
        }
        return $is_valid;
    }

    public static function edit() : bool
    {
        return self::create();
    }

    public static function uploadimg() {
        if (!isset($_FILES['img']) || $_FILES['img']['error'] !== UPLOAD_ERR_OK) {
            NotificationHelper::success('upload', 'Lỗi trong quá trình tải ảnh lên');
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
