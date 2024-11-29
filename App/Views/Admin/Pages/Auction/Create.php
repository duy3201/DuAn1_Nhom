<?php

namespace App\Views\Admin\Pages\Auction;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">TẠO MỚI ĐẤU GIÁ</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Tạo mới sản phẩm đấu giá</h5>
                                <form method="POST" action="/admin/auctions" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="product_name">Tên sản phẩm:</label>
                                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="starting_price">Giá khởi điểm:</label>
                                        <input type="number" class="form-control" id="starting_price" name="starting_price" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái:</label>
                                        <select class="form-control text-white" id="status" name="status" required>
                                            <option value="1">Mở đấu giá</option>
                                            <option value="0">Đóng đấu giá</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="start_time">Thời gian bắt đầu:</label>
                                        <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_time">Thời gian kết thúc:</label>
                                        <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Hình ảnh sản phẩm:</label>
                                        <input type="file" class="form-control" id="img" name="img" accept="img/*" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>
