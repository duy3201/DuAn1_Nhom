<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\CategoryPost;
use App\Validations\CategoryValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\CategoryPost\Create;
use App\Views\Admin\Pages\CategoryPost\Edit;
use App\Views\Admin\Pages\CategoryPost\Index;

class CategoryPostController
{


    // hiển thị danh sách
    public static function index()
    {
        $categorypost = new CategoryPost();
        $data = $categorypost->getAllCategoryPost();

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
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render();
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        //validation các trường dữ liệu
        $is_valid = CategoryValidation::create();

        if(!$is_valid){
            NotificationHelper::error('store', 'Thêm loại bài viết thất bại');
            header('location: /admin/categoryiespost/createcategorypost');
            exit;
        }

        $name = $_POST['name'];
        $status = $_POST['status'];
        //kiểm tra tên loại có tồn tại ch => không được trùng tên
        $categorypost = new CategoryPost();
        $is_exits = $categorypost->getOneCategoryPostByName($name);

        if($is_exits){
            NotificationHelper::error('store', 'Tên loại sản phẩm đã tồn tại');
            header('location: /admin/categoryiespost/createcategorypost');
            exit;
        }

        //thêm vào database
        $data = [
            'name' => $name,
            'status' => $status,
        ];

        $result = $categorypost->createCategoryPost($data);

        if($result){
            NotificationHelper::success('store', 'Thêm loại bài viết thành công');
            header('location: /admin/categoryiespost');
        }else{
            NotificationHelper::error('store', 'Thêm loại bài viết thất bại');
            header('location: /admin/categoryiespost');
        }
    }


    // hiển thị chi tiết
    public static function show()
    {
    }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        // $data = [
        //     'id' => $id,
        //     'name' => 'Category 1',
        //     'status' => 1
        // ];
        $categorypost = new CategoryPost();
        $data = $categorypost->getOneCategoryPost($id);

        if(!$data){
            NotificationHelper::error('edit', 'Không thể xem loại sản phẩm này');
            header('location: /admin/categoryiespost');
            exit;
        }
            Header::render();
            Notification::render();
            NotificationHelper::unset();
            // hiển thị form sửa
            Edit::render($data);
            Footer::render();

    //     if ($data) {
    //         Header::render();
    //         // hiển thị form sửa
    //         Edit::render($data);
    //         Footer::render();
    //     } else {
    //         header('location: /admin/categories');
    //     }
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        //validation các trường dữ liệu
        $is_valid = CategoryValidation::edit();

        if(!$is_valid){
            NotificationHelper::error('update', 'Cập nhật loại bài viết thất bại');
            header("location: /admin/categoryiespost/$id");
            exit;
        }

        $name = $_POST['name'];
       
        $status = $_POST['status'];
        //kiểm tra tên loại có tồn tại ch => không được trùng tên
        $category = new CategoryPost();
        $is_exits = $category->getOneCategoryPostByName($name);

        if($is_exits){
            if($is_exits['id'] != $id){
                NotificationHelper::error('update', 'Tên loại sản phẩm đã tồn tại');
                header("location: /admin/categoryiespost/$id");
                exit;
            }
        }

        //Thực hiện cập nhật
        $data = [
            'name' => $name,
            'status' => $status,
        ];

        $result = $category->updateCategoryPost($id, $data);

        if($result){
            NotificationHelper::success('update', 'Cập nhật loại bài viết thành công');
            header('location: /admin/categoryiespost');
        }else{
            NotificationHelper::error('update', 'Cập nhật loại bài viết thất bại');
            header("location: /admin/categoryiespost/$id");
        }

    }


    // thực hiện xoá
    public static function delete(int $id)
    {
       $category = new CategoryPost();
       $result = $category->deleteCategoryPost($id);

       if($result){
        NotificationHelper::success('delete', 'Xóa loại bài viết thành công');
       }else{
        NotificationHelper::error('delete', 'Xóa loại bài viết thất bại');
       }

       header('location: /admin/categoryiespost');
        
    }
}
