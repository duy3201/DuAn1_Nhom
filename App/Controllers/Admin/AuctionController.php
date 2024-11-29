<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Auction;
use App\Models\Product;
use App\Validations\AuctionValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Auction\Create;
use App\Views\Admin\Pages\Auction\Edit;
use App\Views\Admin\Pages\Auction\Index;

class AuctionController
{
    // Hiển thị danh sách đấu giá
    public static function index()
{
    $productModel = new Product();
    $products = $productModel->getAllProduct();

    $auction = new Auction();

    $auction->updateAuctionStatus();
    $data = $auction->getAllAuction();
    

    Header::render();
    Notification::render();
    NotificationHelper::unset();

    // Hiển thị danh sách đấu giá
    Index::render($data, $products);
    Footer::render();
}


    // Hiển thị giao diện form thêm đấu giá
    public static function create()
    {
        $productModel = new Product();
        $products = $productModel->getAllProduct();

        Header::render();
        Notification::render();
        NotificationHelper::unset();

        Create::render($products);
        Footer::render();
    }

    // Xử lý chức năng thêm đấu giá
    public static function store()
    {
        // Kiểm tra tính hợp lệ của dữ liệu
        $is_valid = AuctionValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm phiên đấu giá thất bại');
            header('location: /admin/auctions/create');
            exit;
        }

        // Thu thập dữ liệu từ form
        $data = [
            'product_name' => $_POST['product_name'],
            'product_id' => $_POST['product_id'],
            'starting_price' => $_POST['starting_price'],
            'start_time' => $_POST['start_time'],
            'end_time' => $_POST['end_time'],
            'status' => $_POST['status'],
        ];

        // Upload hình ảnh nếu có
        $is_upload = AuctionValidation::uploadimg();
        if ($is_upload) {
            $data['img'] = $is_upload;
        }

        // Lưu dữ liệu vào database
        $auction = new Auction();
        $result = $auction->createAuction($data);

        if ($result) {
            NotificationHelper::success('store', 'Thêm phiên đấu giá thành công');
            header('location: /admin/auctions');
        } else {
            NotificationHelper::error('store', 'Thêm phiên đấu giá thất bại');
            header('location: /admin/auctions/create');
        }
    }

    // Hiển thị giao diện form sửa đấu giá
    public static function edit(int $id)
{
    $auction = new Auction();
    $data = $auction->getOneAuction($id);

    $productModel = new Product();
    $products = $productModel->getAllProduct();

    if (!$data) {
        NotificationHelper::error('edit', 'Không tìm thấy phiên đấu giá');
        header('location: /admin/auctions');
        exit;
    }
    $data['products'] = $products;

    Header::render();
    Notification::render();
    NotificationHelper::unset();

    // Hiển thị form sửa đấu giá
    Edit::render($data);
    Footer::render();
}


    // Xử lý chức năng sửa (cập nhật) đấu giá
    public static function update(int $id)
    {
        // Kiểm tra tính hợp lệ của dữ liệu
        $is_valid = AuctionValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật phiên đấu giá thất bại');
            header("location: /admin/auctions/$id");
            exit;
        }

        $data = [
            'product_name' => $_POST['product_name'],
            'product_id'   => $_POST['product_id'],
            'starting_price' => $_POST['starting_price'],
            'start_time'     => $_POST['start_time'],
            'end_time'       => $_POST['end_time'],
            'status'         => $_POST['status'],
        ];

        // Upload hình ảnh nếu có
        $is_upload = AuctionValidation::uploadimg();
        if ($is_upload) {
            $data['img'] = $is_upload;
        }

        $auction = new Auction();
        $result = $auction->updateAuction($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật phiên đấu giá thành công');
            header('location: /admin/auctions');
        } else {
            NotificationHelper::error('update', 'Cập nhật phiên đấu giá thất bại');
            header("location: /admin/auctions/$id");
        }
    }

    // Xóa đấu giá
    public static function delete(int $id)
    {
        $auction = new Auction();
        $result = $auction->deleteAuction($id);

        if ($result) {
            NotificationHelper::success('delete', 'Xóa phiên đấu giá thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa phiên đấu giá thất bại');
        }

        header('location: /admin/auctions');
    }
}
