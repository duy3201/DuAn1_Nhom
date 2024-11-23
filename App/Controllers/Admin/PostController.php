<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\CategoryPost;
use App\Models\Post;
use App\Models\User;
use App\Validations\PostValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Pages\Post\Edit;
use App\Views\Admin\Pages\Post\Index;
use App\Views\Admin\Pages\post\Create as postCreate;

class PostController
{


    // hiển thị danh sách
    public static function index()
    {
        $post = new Post();
        $data = $post->getAllPostJoinCategoryPost();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        $categories_post = new CategoryPost();
        $user = new User();

        // Lấy tất cả danh mục và người dùng
        $data = [
            'categories' => $categories_post->getAllCategoryPost(),
            'users' => $user->getAllUser(),
        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // Hiển thị form thêm
       PostCreate::render($data);
        Footer::render();
    }

     // Xử lý chức năng thêm bài viết
     public static function store()
     {
         // Kiểm tra tính hợp lệ của các trường dữ liệu
         $is_valid = PostValidation::create();
 
         if (!$is_valid) {
             NotificationHelper::error('store', 'Thêm bài viết thất bại rồi');
             header('location: /admin/posts/createpost');
             exit;
         }
 
         $title = $_POST['title'];
 
        
         $post = new Post();
         $is_exits = $post->getOnePostByTitle($title);
 
         if ($is_exits) {
             NotificationHelper::error('store', 'Tên bài viết đã tồn tại');
             header('location: /admin/posts/createpost');
             exit;
         }
 
         // Thêm bài viết vào cơ sở dữ liệu
         $data = [
             'title' => $title,
             'content' => $_POST['content'],
             'id_categories_post' => $_POST['id_categories_post'],
             'status' => $_POST['status'],
             'id_user' => $_POST['id_user'],
             'created_by' => $_POST['id_user']
         ];
 
         $is_upload = PostValidation::uploadimg();
         if ($is_upload) {
             $data['img'] = $is_upload;
         }
 
         $result = $post->createPost($data);
 
         if ($result) {
             NotificationHelper::success('store', 'Thêm bài viết thành công');
             header('location: /admin/posts');
         } else {
             NotificationHelper::error('store', 'Thêm bài viết thất bại');
             header('location: /admin/posts');
         }
     }
 
     // Hiển thị form sửa bài viết
     public static function edit(int $id)
     {
         $post = new Post();
         $data_post = $post->getOnePost($id);
 
         $categorypost = new CategoryPost();
         $data_categorypost = $categorypost->getAllCategoryPost();
 
         $user = new User();
         $data_user = $user->getAllUser();
 
         if (!$data_post) {
             NotificationHelper::error('edit', 'Không thể xem bài viết này');
             header('location: /admin/posts');
             exit;
         }
 
         $data = [
             'post' => $data_post,
             'categories_post' => $data_categorypost,
             'user' => $data_user
         ];
 
         Header::render();
         Notification::render();
         NotificationHelper::unset();
         // Hiển thị form sửa bài viết
         Edit::render($data);
         Footer::render();
     }

     // Xử lý chức năng cập nhật bài viết
    public static function update(int $id)
    {
        // Kiểm tra tính hợp lệ của các trường dữ liệu
        $is_valid = PostValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật bài viết bại rồi');
            header("location: /admin/posts/$id");
            exit;
        }

        $title = $_POST['title'];
        $status = $_POST['status'];

        // Kiểm tra tên bài viết có bị trùng hay không
        $post = new Post();
        $is_exits = $post->getOnePostByName($title);

        if ($is_exits) {
            if ($is_exits['id'] != $id) {
                NotificationHelper::error('update', 'Tiêu đề đã tồn tại');
                header("location: /admin/posts/$id");
                exit;
            }
        }

        // Cập nhật thông tin bài viết
        $data = [
            'title' => $title,
            'content' => $_POST['content'],
            'id_categories_post' => $_POST['id_categories_post'],
            'status' => $_POST['status'],
            'id_user' => $_POST['id_user'],
            'updated_by' => $_POST['updated_by']

        ];

        $is_upload = PostValidation::uploadimg();
        if ($is_upload) {
            $data['img'] = $is_upload;
        }

        $result = $post->updatePost($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật bài viết thành công');
            header('location: /admin/posts');
        } else {
            NotificationHelper::error('update', 'Cập nhật bài viết thất bại');
            header("location: /admin/posts/$id");
        }
    }

 

  
   
   
    
      

    // thực hiện xoá
    public static function delete(int $id)
    {
       $post = new Post();
       $result = $post->deletePost($id);

       if($result){
        NotificationHelper::success('delete', 'Xóa loại bài viết thành công');
       }else{
        NotificationHelper::error('delete', 'Xóa loại bài viết thất bại');
       }

       header('location: /admin/posts');
        
    }
}
