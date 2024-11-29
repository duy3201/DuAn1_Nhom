<?php

namespace App\Views\Admin\Pages\Auction;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
        var_dump($data);
?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">CHỈNH SỬA ĐẤU GIÁ</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Chỉnh sửa sản phẩm đấu giá</h5>
                                <form method="POST" action="/admin/auctions/<?= $data['id'] ?>">
                                    <div class="form-group">
                                        <label for="product_name">Tên sản phẩm:</label>
                                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?= htmlspecialchars($data['product_name']) ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="starting_price">Giá khởi điểm:</label>
                                        <input type="number" class="form-control" id="starting_price" name="starting_price" value="<?= $data['starting_price'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái:</label>
                                        <select class="form-control text-white" id="status" name="status" required>
                                            <option value="1" <?= $data['status'] == 1 ? 'selected' : '' ?>>Mở đấu giá</option>
                                            <option value="0" <?= $data['status'] == 0 ? 'selected' : '' ?>>Đóng đấu giá</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="start_time">Thời gian bắt đầu:</label>
                                        <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="<?= $data['start_time'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_time">Thời gian kết thúc:</label>
                                        <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="<?= $data['end_time'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Hình ảnh sản phẩm:</label>
                                        <input type="file" class="form-control" id="img" name="img" accept="img/*" value="<?= $data['img'] ?>">
                                    </div>
                                    <button type="submit" class="btn btn-success">Cập nhật sản phẩm</button>
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
