<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Validations\ProductVariantValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Product\VariantOptions\EditVariant;
use App\Views\Admin\Pages\Product\VariantOptions\CreateVariant;
use App\Views\Admin\Pages\Product\VariantOptions\IndexVariant;

class VariantOptionController
{
    // Hiển thị danh sách biến thể
    public static function index()
    {
        $productVariant = new ProductVariant();
        $data = $productVariant->getAllProductVariantJoinProduct();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // Hiển thị giao diện danh sách
        IndexVariant::render($data);
        Footer::render();
    }

    // Hiển thị form thêm biến thể
    public static function create()
    {
        $product = new Product();
        $data = $product->getAllProduct();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // Hiển thị form thêm
        CreateVariant::render($data);
        Footer::render();
    }

    // Xử lý chức năng thêm biến thể
    public static function store()
    {
        // Kiểm tra tính hợp lệ của các trường dữ liệu
        $is_valid = ProductVariantValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm biến thể thất bại');
            header('location: /admin/productvariants/createvariant');
            exit;
        }

        $name = $_POST['label'];

        // Kiểm tra tên biến thể có bị trùng hay không
        $productVariant = new ProductVariant();
        $is_exits = $productVariant->getOneProductVariantByName($name);

        if ($is_exits) {
            NotificationHelper::error('store', 'Tên biến thể đã tồn tại');
            header('location: /admin/productvariants/createvariant');
            exit;
        }

        // Thêm biến thể vào cơ sở dữ liệu
        $data = [
            'name' => $name,
            'id_product_variant' => $_POST['id_product_variant'],
        ];

        $result = $productVariant->createProductVariant($data);

        if ($result) {
            NotificationHelper::success('store', 'Thêm biến thể thành công');
            header('location: /admin/productvariants');
        } else {
            NotificationHelper::error('store', 'Thêm biến thể thất bại');
            header('location: /admin/productvariants');
        }
    }

    // Hiển thị form sửa biến thể
    public static function edit(int $id)
    {

        $productVariant = new ProductVariant();
        $data_productvariant = $productVariant->getOneProductVariant($id);

        $product = new Product();
        $data_product = $product->getAllProduct();

        if (!$data_productvariant) {
            NotificationHelper::error('edit', 'Không thể xem biến thể này');
            header('location: /admin/productvariants');
            exit;
        }

        $data = [
            'productvariant' => $data_productvariant,
            'product' => $data_product,
        ];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // Hiển thị form sửa biến thể
        EditVariant::render($data);
        Footer::render();
    }

    // Xử lý chức năng cập nhật biến thể
    public static function update(int $id)
    {
        // Kiểm tra tính hợp lệ của các trường dữ liệu
        $is_valid = ProductVariantValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật biến thể thất bại');
            header("location: /admin/productvariants/$id");
            exit;
        }

        $name = $_POST['label'];

        // Kiểm tra tên biến thể có bị trùng hay không
        $productVariant = new ProductVariant();
        $is_exits = $productVariant->getOneProductVariantByName($name);

        if ($is_exits) {
            if ($is_exits['id'] != $id) {
                NotificationHelper::error('update', 'Tên biến thể đã tồn tại');
                header("location: /admin/productvariants/$id");
                exit;
            }
        }

        // Cập nhật thông tin biến thể
        $data = [
            'name' => $name,
            'id_product_variant' => $_POST['id_product_variant'],
        ];

        $result = $productVariant->updateProductVariant($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật biến thể thành công');
            header('location: /admin/productvariants');
        } else {
            NotificationHelper::error('update', 'Cập nhật biến thể thất bại');
            header("location: /admin/productvariants/$id");
        }
    }

    // Xóa biến thể
    public static function delete(int $id)
    {
       $productVariant = new ProductVariant();
       $result = $productVariant->deleteProductVariant($id);

       if($result){
        NotificationHelper::success('delete', 'Xóa loại biến thể thành công');
       }else{
        NotificationHelper::error('delete', 'Xóa loại biến thể thất bại');
       }

       header('location: /admin/productvariants');
        
    }
}
