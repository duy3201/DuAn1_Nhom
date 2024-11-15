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

class ProductController
{


    // hiển thị danh sách
    public static function index()
    {

        $product = new Product();
        $data = $product->getAllProductJoinCategory();

        // echo '<pre';
        // var_dump($data);
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
        $category = new Category();
        $data = $category->getAllCategory();
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render($data);
        Footer::render();
    }


    // xử lý chức năng thêm
    public static function store()
    {
        //validation các trường dữ liệu
        $is_valid = ProductValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm sản phẩm thất bại');
            header('location: /admin/products/create');
            exit;
        }

        $name = $_POST['name'];

        //kiểm tra tên loại có tồn tại ch => không được trùng tên
        $product = new Product();
        $is_exits = $product->getOneProductByName($name);

        if ($is_exits) {
            NotificationHelper::error('store', 'Tên sản phẩm đã tồn tại');
            header('location: /admin/products/create');
            exit;
        }

        //thêm vào database
        $data = [
            'name' => $name,
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'is_featured' => $_POST['is_featured'],
            'status' => $_POST['status'],
            'id_category' => $_POST['id_category'],
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


    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $product = new Product();
        $data_product = $product->getOneProduct($id);

        $category = new Category();
        $data_category = $category->getAllCategory();


        if (!$data_product) {
            NotificationHelper::error('edit', 'Không thể xem sản phẩm này');
            header('location: /admin/products');
            exit;
        }

        $data = [
            'product' => $data_product,
            'category' => $data_category,
        ];

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
        $is_valid = ProductValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật loại sản phẩm thất bại');
            header("location: /admin/products/$id");
            exit;
        }

        $name = $_POST['name'];
        $status = $_POST['status'];
        //kiểm tra tên loại có tồn tại ch => không được trùng tên
        $product = new Product();
        $is_exits = $product->getOneProductByName($name);

        if ($is_exits) {
            if ($is_exits['id'] != $id) {
                NotificationHelper::error('update', 'Tên sản phẩm đã tồn tại');
                header("location: /admin/products/$id");
                exit;
            }
        }

        //Thực hiện cập nhật
        $data = [
            'name' => $name,
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'is_featured' => $_POST['is_featured'],
            'status' => $_POST['status'],
            'id_category' => $_POST['id_category'],
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


    public static function delete(int $id)
    {
        $product = new Product();

        $resultComments = $product->deleteCommentsByProductId($id);

        if ($resultComments) {
            $resultProduct = $product->deleteProduct($id);

            if ($resultProduct) {
                NotificationHelper::success('delete', 'Xóa sản phẩm thành công');
            } else {
                NotificationHelper::error('delete', 'Xóa sản phẩm thất bại');
            }
        } else {
            NotificationHelper::error('delete', 'Xóa sản phẩm thất bại do không thể xóa các bình luận liên quan');
        }

        header('location: /admin/products');
        exit;
    }
}
