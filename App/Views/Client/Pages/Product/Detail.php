<?php

namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Detail extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
        // var_dump($is_login);
        // Kiểm tra cookie 'user'
?>


        <section class="product-shop spad page-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="filter-widget">
                            <h4 class="fw-title">Danh mục</h4>
                            <ul class="filter-catagories">
                                <?php
                                Category::render($data['categories']);
                                ?>
                            </ul>
                        </div>
                        <!-- <div class="filter-widget">
                            <h4 class="fw-title">Chất lượng</h4>
                            <div class="fw-brand-check">
                                <div class="bc-item">
                                    <label for="bc-calvin">
                                        New Like
                                        <input type="checkbox" id="bc-calvin">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="bc-item">
                                    <label for="bc-diesel">
                                        Good
                                        <input type="checkbox" id="bc-diesel">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="bc-item">
                                    <label for="bc-polo">
                                        Acceptable
                                        <input type="checkbox" id="bc-polo">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>-->
                        <<<<<<< HEAD
                            </div>
                            =======
                    </div>
                    >>>>>>> 187b35d ([client]Chất-Lượng-Theo-Giá-Chỉnh-Sổ-Menu)
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-pic-zoom">

                                    <img class="product-big-img" src="<?= APP_URL ?>/public/assets/admin/img/<?= $data['products']['img'] ?>" alt="">
                                    <!-- <div class="zoom-icon">
                                        <i class="fa fa-search-plus"></i>
                                    </div> -->
                                </div>
                                <div class="product-thumbs">
                                    <div class="product-thumbs-track ps-slider owl-carousel">
                                        <div class="pt active" data-imgbigurl="/public/assets/admin/img/product-1.jpg"><img
                                                src="<?= APP_URL ?>/public/assets/admin/img/<?= $data['products']['img'] ?>" alt=""></div>
                                        <div class="pt" data-imgbigurl="/public/assets/admin/img/product-1.jpg"><img
                                                src="<?= APP_URL ?>/public/assets/admin/img/<?= $data['products']['img'] ?>" alt=""></div>
                                        <div class="pt" data-imgbigurl="/public/assets/admin/img/product-1.jpg"><img
                                                src="<?= APP_URL ?>/public/assets/admin/img/<?= $data['products']['img'] ?>" alt=""></div>
                                        <div class="pt" data-imgbigurl="/public/assets/admin/img/product-1.jpg"><img
                                                src="<?= APP_URL ?>/public/assets/admin/img/<?= $data['products']['img'] ?>" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-details">
                                    <div class="pd-title">
                                        <!-- <span>oranges</span> -->
                                        <h3><?= $data['products']['name'] ?></h3>
                                        <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                    </div>
                                    <div class="pd-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span>(5)</span>
                                    </div>
                                    <p><?= $data['products']['description'] ?></p>
                                    <!-- Hiển thị giá sản phẩm -->
                                    <div class="pd-desc p-price">

                                        <h4 id="priceDisplay"><?= number_format($data['products']['product_price'], 0, ',', '.') ?> VNĐ </h4>
                                    </div>

                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                        <a href="#" class="primary-btn pd-cart">Thêm giỏ hàng</a>
                                    </div>

                                    <div class="filter-widget">
                                        <h4 class="fw-title">Chọn chất lượng sản phẩm:</h4>
                                        <div class="fw-size-choose">
                                            <?php if (!empty($data['quality'])): ?>
                                                <?php foreach ($data['quality'] as $index => $item): ?>
                                                    <div class="sc-item">
                                                        <input
                                                            type="radio"
                                                            id="quality-<?= htmlspecialchars($index) ?>"
                                                            name="product_quality"
                                                            value="<?= htmlspecialchars($item['product_quality']) ?>"
                                                            <?= $index === 0 ? 'checked' : '' ?>>
                                                        <label for="quality-<?= htmlspecialchars($index) ?>"><?= htmlspecialchars($item['product_quality']) ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <p class="text-danger">Không có chất lượng nào để chọn</p>
                                            <?php endif; ?>
                                        </div>
                                        <!-- Dữ liệu ẩn chứa danh sách giá -->
                                        <input
                                            type="hidden"
                                            id="quality-prices"
                                            value='<?= json_encode($data['quality'], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>'>
                                    </div>

                                    <ul class="pd-tags">
                                        <li><span>LOẠI: </span><?= $data['products']['category_name'] ?></li>
                                    </ul>
                                    <div class="pd-share">
                                        <div class="p-code">Mã : <?= $data['products']['id'] ?></div>
                                        <div class="pd-social">
                                            <a href="#"><i class="ti-facebook"></i></a>
                                            <a href="#"><i class="ti-twitter-alt"></i></a>
                                            <a href="#"><i class="ti-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab">
                            <div class="tab-item">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#tab-1" role="tab">Mô tả</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab-2" role="tab">Chi tiết</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab-3" role="tab">Đánh giá của khách hàng (02)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-item-content">
                                <div class="tab-content">
                                    <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                        <div class="product-content">
                                            <div class="row">
                                                <div class="col-lg-7">

                                                    <p><?= $data['products']['description'] ?></p>
                                                </div>
                                                <div class="col-lg-5">
                                                    <img src="img/product-single/tab-desc.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                        <div class="specification-table">
                                            <table>
                                                <tr>
                                                    <td class="p-catagory">Đánh giá của khách hàng</td>
                                                    <td>
                                                        <div class="pd-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <span>(5)</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Giá</td>
                                                    <td>
                                                        <div class="p-price"><?= $data['products']['product_price'] ?>VNĐ</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Thêm Giỏ Hàng</td>
                                                    <td>
                                                        <div class="cart-add">+ Thêm giỏ hàng</div>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td class="p-catagory">sẵn có</td>
                                                    <td>
                                                        <div class="p-stock">22 trong kho</div>
                                                    </td>
                                                </tr> -->
                                                <tr>
                                                    <td class="p-catagory">Cân nặng</td>
                                                    <td>
                                                        <div class="p-weight">1,3kg</div>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td class="p-catagory">Kích thước</td>
                                                    <td>
                                                        <div class="p-size">Xxl</div>
                                                    </td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <td class="p-catagory">Màu</td>
                                                    <td><span class="cs-color"></span></td>
                                                </tr>
                                                <tr> -->
                                                <td class="p-catagory">Mã</td>
                                                <td>
                                                    <div class="p-code"><?= $data['products']['id'] ?></div>
                                                </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                        <div class="customer-review-option">
                                            <div class="row d-flex justify-content-center mt-4 mb-4">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header bg-light text-white text-center d-flex align-items-center justify-content-center" style="height: 100px;">
                                                            <h4 class="card-title m-0">Bình luận mới nhất</h4>
                                                        </div>

                                                        <div class="card-body comment-widgets">
                                                            <!-- Hiển thị danh sách bình luận -->
                                                            <?php if (isset($data['comments']) && $data['comments']) : ?>
                                                                <?php foreach ($data['comments'] as $item) : ?>
                                                                    <div class="d-flex flex-row comment-row my-3 p-2 border-bottom">
                                                                        <div class="p-2">
                                                                            <img src="<?= $item['avatar'] ? APP_URL . '/public/assets/client/img/' . $item['avatar'] : APP_URL . '/public/assets/client/img/banner-1.jpg' ?>"
                                                                                alt="user" height="45" width="50" class="rounded-circle">
                                                                        </div>
                                                                        <div class="comment-text w-100">
                                                                            <h6 class="font-medium"><?= htmlspecialchars($item['name']) ?> (<?= htmlspecialchars($item['username']) ?>)</h6>
                                                                            <p class="m-b-15"><?= htmlspecialchars($item['content']) ?></p>
                                                                            <div class="comment-footer d-flex justify-content-between">
                                                                                <span class="text-muted"><?= $item['date'] ?></span>
                                                                                <?php if ($is_login && $_SESSION['user']['id'] == $item['id_user']) : ?>
                                                                                    <div>
                                                                                        <!-- Nút sửa -->
                                                                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="collapse"
                                                                                            data-target="#editComment<?= $item['id'] ?>">Sửa</button>

                                                                                        <!-- Nút xóa -->
                                                                                        <form action="/comments/<?= $item['id'] ?>" method="post"
                                                                                            onsubmit="return confirm('Bạn chắc chắn muốn xóa bình luận này?')"
                                                                                            style="display:inline-block">
                                                                                            <input type="hidden" name="method" value="DELETE">
                                                                                            <input type="hidden" name="id_product" value="<?= $data['products']['id'] ?>">
                                                                                            <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                                                                                        </form>
                                                                                    </div>
                                                                                <?php endif; ?>
                                                                            </div>

                                                                            <!-- Form sửa bình luận -->
                                                                            <div class="collapse mt-2" id="editComment<?= $item['id'] ?>">
                                                                                <form action="/comments/<?= $item['id'] ?>" method="post">
                                                                                    <input type="hidden" name="method" value="PUT">
                                                                                    <input type="hidden" name="id_product" value="<?= $data['products']['id'] ?>">
                                                                                    <textarea class="form-control" name="content" rows="3"><?= htmlspecialchars($item['content']) ?></textarea>
                                                                                    <button type="submit" class="btn btn-success btn-sm mt-2">Cập nhật</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            <?php else : ?>
                                                                <p class="text-center text-danger">Chưa có bình luận nào</p>
                                                            <?php endif; ?>

                                                            <?php if ($is_login && isset($_SESSION['user']['id'])) : ?>
                                                                <div class="d-flex flex-row comment-row mt-4">
                                                                    <div class="p-2">
                                                                        <img src="<?= $_SESSION['user']['avatar'] ? APP_URL . '/public/assets/client/img/' . $_SESSION['user']['avatar'] : APP_URL . '/public/assets/admin/img/default.png' ?>"
                                                                            alt="user" height="45" width="50" class="rounded-circle">
                                                                    </div>
                                                                    <div class="comment-text w-100">
                                                                        <form action="/comments/" method="post">
                                                                            <input type="hidden" name="method" value="POST">
                                                                            <input type="hidden" name="id_product" value="<?= htmlspecialchars($data['products']['id']) ?>">
                                                                            <input type="hidden" name="id_user" value="<?= htmlspecialchars($_SESSION['user']['id']) ?>">
                                                                            <textarea class="form-control rounded-0" name="content" rows="3" placeholder="Nhập bình luận..." required></textarea>
                                                                            <button type="submit" class="btn btn-primary btn-sm mt-2">Gửi</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            <?php else : ?>
                                                                <p class="text-center text-danger">Vui lòng đăng nhập để bình luận</p>
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php

    }
}
