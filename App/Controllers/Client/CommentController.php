<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Validations\CommentValidation;

class CommentController
{
    // xử lý chức năng thêm
    public static function store()
    {
        // Kiểm tra mã người dùng
        if (empty($_POST['id_user'])) {
            NotificationHelper::error('store', 'Không tìm thấy mã người dùng.');
            if (isset($_POST['id_product']) && $_POST['id_product']) {
                $id_product = $_POST['id_product'];
                header("location: /products/$id_product");
            } else {
                header('location: /products/');
            }
            exit;
        }

        // Validation các trường dữ liệu
        $is_valid = CommentValidation::createClient();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Bình luận thất bại');
            if (isset($_POST['id_product']) && $_POST['id_product']) {
                $id_product = $_POST['id_product'];
                header("location: /products/$id_product");
            } else {
                header('location: /products/');
            }
            exit;
        }

        // Lấy dữ liệu từ form
        $id_product = $_POST['id_product'];
        $data = [
            'content' => trim($_POST['content']),
            'id_product' => $_POST['id_product'],
            'id_user' => $_POST['id_user'],
        ];

        // Thêm bình luận
        $comment = new Comment();
        $result = $comment->createComment($data);

        // Phản hồi kết quả
        if ($result) {
            NotificationHelper::success('store', 'Thêm bình luận thành công');
        } else {
            NotificationHelper::error('store', 'Thêm bình luận thất bại');
        }

        header("location: /products/$id_product");
    }




    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        //validation các trường dữ liệu
        $is_valid = CommentValidation::editClient();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật bình luận thất bại');
            if (isset($_POST['id_product']) && $_POST['id_product']) {
                $id_product = $_POST['id_product'];
                header("location: /products/$id_product");
            } else {
                header('location: /products');
            }
            exit;
        }




        //Thực hiện cập nhật
        $data = [
            'content' => $_POST['content'],

        ];

        $comment = new Comment();

        $result = $comment->updateComment($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật bình luận thành công');
        } else {
            NotificationHelper::success('update', 'Cập nhật bình luận thất bại');
        }

        if (isset($_POST['id_product']) && $_POST['id_product']) {
            $id_product = $_POST['id_product'];
            header("location: /products/$id_product");
        } else {
            header('location: /products');
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $comment = new Comment();
        $result = $comment->deleteComment($id);

        if ($result) {
            NotificationHelper::success('delete', 'Xóa bình luận thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa bình luận thất bại');
        }

        if (isset($_POST['id_product']) && $_POST['id_product']) {
            $id_product = $_POST['id_product'];
            header("location: /products/$id_product");
        } else {
            header('location: /products');
        }
    }
}
