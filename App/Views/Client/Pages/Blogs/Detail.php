<?php

namespace App\Views\Client\Pages\Blogs;

use App\Helpers\AuthHelper;
use App\Views\BaseView;
use App\Views\Client\Components\CategoryPost;


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
                                <?php CategoryPost::render($data['categories_post']); ?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="post-details">
                                    <!-- Tiêu đề bài viết -->
                                    <div class="post-title">
                                        <h1><?= htmlspecialchars($data['posts']['title']) ?></h1>
                                    </div>

                                    <!-- Hình ảnh bìa -->
                                    <div class="post-image my-4">
                                        <img class="img-fluid" src="<?= APP_URL ?>/public/assets/admin/img/<?= htmlspecialchars($data['posts']['img']) ?>">
                                    </div>

                                    <!-- Nội dung bài viết -->
                                    <div class="post-content">
                                        <p><?= nl2br(html_entity_decode($data['posts']['content'])) ?></p>
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
