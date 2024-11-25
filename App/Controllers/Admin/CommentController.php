<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Validations\CommentValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Comment\Edit;
use App\Views\Admin\Pages\Comment\Index;

class CommentController
{


    // hiển thị danh sách
    public static function index()
    {

        $comment = new Comment();
        $data = $comment->getAllCommentJoinProductAndUser();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }

    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        $comment = new Comment();
        $data = $comment->getOneCommentJoinProductAndUser($id);

        if(!$data){
            NotificationHelper::error('edit', 'Không thể xem loại sản phẩm này');
            header('location: /admin/comments/');
            exit;
        }
            Header::render();
            Notification::render();
            NotificationHelper::unset();
            // hiển thị form sửa
            Edit::render($data);
            Footer::render();
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        //validation các trường dữ liệu
        $is_valid = CommentValidation::edit();

        if(!$is_valid){
            NotificationHelper::error('update', 'Cập nhật loại sản phẩm thất bại');
            header("location: /admin/comments/$id");
            exit;
        }

        $status = $_POST['status'];
        //kiểm tra tên loại có tồn tại ch => không được trùng tên
        $comment = new Comment();

        //Thực hiện cập nhật
        $data = [
            'status' => $status,
        ];

        $result = $comment->updateComment($id, $data);

        if($result){
            NotificationHelper::success('update', 'Cập nhật bình luận thành công');
            header('location: /admin/comments');
        }else{
            NotificationHelper::success('update', 'Cập nhật bình luận phẩm thất bại');
            header("location: /admin/comments/$id");
        }

    }


    // thực hiện xoá
    public static function delete(int $id)
    {
       $comment = new Comment();
       $result = $comment->deleteComment($id);

       if($result){
        NotificationHelper::success('delete', 'Xóa loại sản phẩm thành công');
       }else{
        NotificationHelper::error('delete', 'Xóa loại sản phẩm thất bại');
       }

       header('location: /admin/comments');
        
    }
    

}
