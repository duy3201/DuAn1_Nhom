<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Validations\ProductValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Product\Create;
use App\Views\Admin\Pages\Product\Edit;
use App\Views\Admin\Pages\Product\Index;
use App\Models\User;

class ProductController
{
    // Hiển thị danh sách sản phẩm
    public static function index()
    {
        $product = new Product();
        $data = $product->getAllProductJoinCategory();


        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // Hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }

    // Hiển thị form thêm sản phẩm
    public static function create()
    {
        $category = new Category();
        $user = new User();

        // Lấy tất cả danh mục và người dùng
        $data = [
            'categories' => $category->getAllCategory(),
            'users' => $user->getAllUser(),
        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // Hiển thị form thêm
        Create::render($data);
        Footer::render();
    }

    // Xử lý chức năng thêm sản phẩm
    public static function store()
    {
        // Kiểm tra tính hợp lệ của các trường dữ liệu
        $is_valid = ProductValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm sản phẩm thất bại');
            header('location: /admin/products/createproduct');
            exit;
        }

        $name = $_POST['name'];

        // Kiểm tra tên sản phẩm có bị trùng hay không
        $product = new Product();
        $is_exits = $product->getOneProductByName($name);

        if ($is_exits) {
            NotificationHelper::error('store', 'Tên sản phẩm đã tồn tại');
            header('location: /admin/products/createproduct');
            exit;
        }

        // Thêm sản phẩm vào cơ sở dữ liệu
        $data = [
            'name' => $name,
            'description' => $_POST['description'],
            'is_featured' => $_POST['is_featured'],
            'status' => $_POST['status'],
            'id_category' => $_POST['id_category'],
            'id_user' => $_POST['id_user'],
        ];

        $is_upload = ProductValidation::uploadimg();
        if ($is_upload) {
            $data['img'] = $is_upload;
        }

        $result = $product->createProduct($data);

        if ($result) {
            NotificationHelper::success('store', 'Thêm sản phẩm thành công');
            header('location: /admin/products');
        } else {
            NotificationHelper::error('store', 'Thêm sản phẩm thất bại');
            header('location: /admin/products');
        }
    }

    // Hiển thị form sửa sản phẩm
    public static function edit(int $id)
    {
        $product = new Product();
        $data_product = $product->getOneProduct($id);

        $category = new Category();
        $data_category = $category->getAllCategory();

        $user = new User();
        $data_user = $user->getAllUser();

        if (!$data_product) {
            NotificationHelper::error('edit', 'Không thể xem sản phẩm này');
            header('location: /admin/products');
            exit;
        }

        $data = [
            'product' => $data_product,
            'category' => $data_category,
            'user' => $data_user
        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // Hiển thị form sửa sản phẩm
        Edit::render($data);
        Footer::render();
    }

    // Xử lý chức năng cập nhật sản phẩm
    public static function update(int $id)
    {
        // Kiểm tra tính hợp lệ của các trường dữ liệu
        $is_valid = ProductValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật sản phẩm thất bại');
            header("location: /admin/products/$id");
            exit;
        }

        $name = $_POST['name'];
        $status = $_POST['status'];

        // Kiểm tra tên sản phẩm có bị trùng hay không
        $product = new Product();
        $is_exits = $product->getOneProductByName($name);

        if ($is_exits) {
            if ($is_exits['id'] != $id) {
                NotificationHelper::error('update', 'Tên sản phẩm đã tồn tại');
                header("location: /admin/products/$id");
                exit;
            }
        }

        // Cập nhật thông tin sản phẩm
        $data = [
            'name' => $name,
            'description' => $_POST['description'],
            'is_featured' => $_POST['is_featured'],
            'status' => $_POST['status'],
            'id_category' => $_POST['id_category'],
            'id_user' => $_POST['id_user'],
        ];

        $is_upload = ProductValidation::uploadimg();
        if ($is_upload) {
            $data['img'] = $is_upload;
        }

        $result = $product->updateProduct($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật sản phẩm thành công');
            header('location: /admin/products');
        } else {
            NotificationHelper::error('update', 'Cập nhật sản phẩm thất bại');
            header("location: /admin/products/$id");
        }
    }

    // Xóa sản phẩm
    public static function delete(int $id)
    {
        $product = new Product();

        // $resultComments = $product->deleteCommentsByProductId($id);

        // if ($resultComments) {
            $resultProduct = $product->deleteProduct($id);

            if ($resultProduct) {
                NotificationHelper::success('delete', 'Xóa sản phẩm thành công');
            } else {
                NotificationHelper::error('delete', 'Xóa sản phẩm thất bại');
            }
        // } else {
        //     NotificationHelper::error('delete', 'Xóa sản phẩm thất bại do không thể xóa các bình luận liên quan');
        // }

        header('location: /admin/products');
        exit;
    }
}
