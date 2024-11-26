<?php

namespace App\Views\Admin;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {

?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0 text-white"><?= $data['total_category'] ?></h3>
                                            <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success ">
                                            <i class="fa-solid fa-list"></i>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Số lượng danh mục</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0 text-white"><?= $data['total_product'] ?></h3>
                                            <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-primary">
                                            <i class="fa-solid fa-receipt"></i>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Số lượng sản phẩm</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0 text-white"><?= $data['total_user'] ?></h3>
                                            <p class="text-danger ml-2 mb-0 font-weight-medium"></p>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-warning">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Số lượng khách hàng</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0 text-white"><?= $data['total_comment'] ?></h3>
                                            <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-info ">
                                            <i class="fa-solid fa-comment-dots"></i>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Số lượng bình luận</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-white">Lịch sử giao dịch</h4>
                                <canvas id="transaction-history" class="transaction-chart"></canvas>
                                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                    <div class="text-md-center text-xl-left">
                                        <h6 class="mb-1 text-white">Chuyển đến Paypal</h6>
                                        <p class="text-muted mb-0">07 tháng 1 năm 2019, 09:12AM</p>
                                    </div>
                                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                        <h6 class="font-weight-bold mb-0 text-white">236 VND</h6>
                                    </div>
                                </div>
                                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                    <div class="text-md-center text-xl-left">
                                        <h6 class="mb-1 text-white">Chuyển sang Stripe</h6>
                                        <p class="text-muted mb-0">07 tháng 1 năm 2019, 09:12AM</p>
                                    </div>
                                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                        <h6 class="font-weight-bold mb-0 text-white">593 VND</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="card-title mb-0">Thống kê</h4>
                                    <select id="chartSelector" class="form-select form-select-sm" onchange="changeChart()" style="width: 200px;">
                                        <option value="product">Thống kê loại sản phẩm</option>
                                        <option value="comment">Thống kê bình luận sản phẩm</option>
                                    </select>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-12 text-center">
                                        <div class="preview-list">
                                            <!-- Biểu đồ thống kê sản phẩm -->
                                            <canvas id="product_by_category" class="chart-canvas" style="display: block;"></canvas>
                                            <!-- Biểu đồ thống kê bình luận -->
                                            <canvas id="comment_by_product" class="chart-canvas" style="display: none;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- <div class="grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <h4 class="card-title mb-1 ">Thống kê bình luận sản phẩm</h4>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="preview-list">
                                        <div>
                                            <canvas id="comment_by_product"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <h4 class="card-title mb-1 ">Bình Luận</h4>
                                <p class="text-muted mb-1">Trạng thái dữ liệu của bạn</p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="preview-list">
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-primary">
                                                    <i class="fa-solid fa-user-tie"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject text-white">Nguyễn Văn Lá</h6>
                                                    <p class="text-muted mb-0">Good</p>
                                                </div>
                                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                    <p class="text-muted">15 phút trước</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-success">
                                                    <i class="fa-solid fa-user-tie"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject text-white">Huỳnh Vủ Duy</h6>
                                                    <p class="text-muted mb-0">Sản phẩm chất lượng</p>
                                                </div>
                                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                    <p class="text-muted">35 phút trước</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-info">
                                                    <i class="fa-solid fa-user-tie"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject text-white">Dương Quốc Trọng</h6>
                                                    <p class="text-muted mb-0">Giá cả hợp lý</p>
                                                </div>
                                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                    <p class="text-muted">50 phút trước</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-danger">
                                                    <i class="fa-solid fa-user-tie"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject text-white">Đinh Trần Trung Khoa</h6>
                                                    <p class="text-muted mb-0">Shop uy tính, chất lượng</p>
                                                </div>
                                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                    <p class="text-muted">55 phút trước</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-warning">
                                                    <i class="fa-solid fa-user-tie"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject text-white">Nguyễn Văn Lá</h6>
                                                    <p class="text-muted mb-0">Giao hàng rất nhanh</p>
                                                </div>
                                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                    <p class="text-muted">1 giờ trước</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-white d-block text-center text-sm-left d-sm-inline-block">Copyright © Old Style</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        </div>

        <script>
            function productByCategoryChart() {
                var php_data = <?= json_encode($data['product_by_category']) ?>;
                var labels = [];
                var data = [];
                for (let i of php_data) {
                    labels.push(i.name);
                    data.push(i.count);
                }

                const ctx = document.getElementById('product_by_category');
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        datasets: [{
                            label: 'Số lượng sản phẩm',
                            data: data,
                            borderWidth: 1
                        }],
                        labels: labels
                    }
                });
            }

            function commentByProductChart() {
                var php_data = <?= json_encode($data['comment_by_product']) ?>;
                var labels = [];
                var data = [];
                for (let i of php_data) {
                    labels.push(i.name);
                    data.push(i.count);
                }

                const ctx = document.getElementById('comment_by_product');
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        datasets: [{
                            label: 'Số lượng bình luận',
                            data: data,
                            borderWidth: 1
                        }],
                        labels: labels
                    }
                });
            }

            // Thay đổi hiển thị biểu đồ dựa trên lựa chọn
            function changeChart() {
                const selector = document.getElementById('chartSelector').value;
                const productChart = document.getElementById('product_by_category');
                const commentChart = document.getElementById('comment_by_product');

                if (selector === 'product') {
                    productChart.style.display = 'block';
                    commentChart.style.display = 'none';
                } else if (selector === 'comment') {
                    productChart.style.display = 'none';
                    commentChart.style.display = 'block';
                }
            }

            productByCategoryChart();
            commentByProductChart();
        </script>
<?php

    }
}

?>