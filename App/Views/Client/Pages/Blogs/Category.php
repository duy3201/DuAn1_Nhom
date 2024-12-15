<?php
namespace App\Views\Client\Pages\Blogs;

use App\Views\BaseView;
use App\Views\Client\Components\CategoryPost;

class Category extends BaseView
{
    public static function render($data = null)
    {
        $postsPerPage = 6;
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
        
        // Filter posts based on search query
        if ($searchQuery) {
            $filteredPosts = array_filter($data['posts'], function($post) use ($searchQuery) {
                return strpos(strtolower($post['title']), strtolower($searchQuery)) !== false;
            });
        } else {
            $filteredPosts = $data['posts'];
        }

        $totalPosts = count($filteredPosts);
        $totalPages = ceil($totalPosts / $postsPerPage);

        $startIndex = ($currentPage - 1) * $postsPerPage;
        $paginatedPosts = array_slice($filteredPosts, $startIndex, $postsPerPage);

        ?>
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="/"><i class="fa fa-home"></i> Trang chủ</a>
                            <span>Bài viết</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="blog-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                        <div class="blog-sidebar">
                            <div class="search-form">
                                <h4>Tìm kiếm</h4>
                                <form action="" method="get">
                                    <input type="text" name="search" value="<?= htmlspecialchars($searchQuery) ?>" placeholder="Tìm kiếm . . .  ">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="blog-catagory">
                                <h4>Danh mục</h4>
                                <ul>
                                    <?php CategoryPost::render($data['categories_post']); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 order-1 order-lg-2">
                        <?php if ($paginatedPosts) : ?>
                            <div class="row">
                                <?php foreach ($paginatedPosts as $item) : ?>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="blog-item">
                                            <a href="/blogs/<?= htmlspecialchars($item['id']); ?>">
                                                <div class="bi-pic">
                                                    <img src="<?= APP_URL ?>/public/assets/admin/img/<?= $item['img'] ?>" alt="">
                                                </div>
                                                <div class="bi-text">
                                                    <h4><?= $item['title'] ?></h4>
                                                    <p><?= $item['categories_post_name'] ?><span>- 19 Tháng 5, 2019</span></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <h4 class="text-center text-danger">Không có dữ liệu</h4>
                        <?php endif; ?>

                        <nav>
                            <ul class="pagination justify-content-center">
                                <?php
                                $paginationRange = 2;
                                $startPage = max(1, $currentPage - $paginationRange);
                                $endPage = min($totalPages, $currentPage + $paginationRange);

                                if ($currentPage > 1) {
                                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '&search=' . urlencode($searchQuery) . '">&laquo;</a></li>';
                                } else {
                                    echo '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
                                }

                                if ($startPage > 2) {
                                    echo '<li class="page-item"><a class="page-link" href="?page=1&search=' . urlencode($searchQuery) . '">1</a></li>';
                                    echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                }

                                for ($i = $startPage; $i <= $endPage; $i++) {
                                    $activeClass = ($i == $currentPage) ? 'active' : '';
                                    echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?page=' . $i . '&search=' . urlencode($searchQuery) . '">' . $i . '</a></li>';
                                }

                                if ($endPage < $totalPages - 1) {
                                    echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                    echo '<li class="page-item"><a class="page-link" href="?page=' . $totalPages . '&search=' . urlencode($searchQuery) . '">' . $totalPages . '</a></li>';
                                }

                                if ($currentPage < $totalPages) {
                                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '&search=' . urlencode($searchQuery) . '">&raquo;</a></li>';
                                } else {
                                    echo '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
?>
