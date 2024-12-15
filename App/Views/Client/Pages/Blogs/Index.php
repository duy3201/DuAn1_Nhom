<?php

namespace App\Views\Client\Pages\Blogs;

use App\Views\BaseView;
use App\Views\Client\Components\CategoryPost;

class Index extends BaseView
{
    public static function render($data = null)
    {
        $postsPerPage = 6;
        $totalPosts = count($data['posts']);
        $totalPages = ceil($totalPosts / $postsPerPage);
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $currentPage = max(1, min($currentPage, $totalPages));
        $startIndex = ($currentPage - 1) * $postsPerPage;

        // Lấy từ khóa tìm kiếm từ GET request
        $searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';
        
        // Lọc các bài viết theo từ khóa tìm kiếm
        $filteredPosts = array_filter($data['posts'], function($post) use ($searchKeyword) {
            return empty($searchKeyword) || strpos(strtolower($post['title']), strtolower($searchKeyword)) !== false;
        });

        $totalFilteredPosts = count($filteredPosts);
        $totalFilteredPages = ceil($totalFilteredPosts / $postsPerPage);
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $currentPage = max(1, min($currentPage, $totalFilteredPages));

        $startIndex = ($currentPage - 1) * $postsPerPage;
        $currentPosts = array_slice($filteredPosts, $startIndex, $postsPerPage);

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
                                <form action="#" method="get">
                                    <input type="text" name="search" value="<?= htmlspecialchars($searchKeyword) ?>" placeholder="Tìm kiếm . . . ">
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
                        <?php if (count($currentPosts)) : ?>
                            <div class="row">
                                <?php foreach ($currentPosts as $item) : ?>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="blog-item">
                                            <div class="bi-pic">
                                                <a href="/blogs/<?= htmlspecialchars($item['id']); ?>"> <img src="<?= APP_URL ?>/public/assets/admin/img/<?= $item['img'] ?>" alt=""></a>
                                            </div>
                                            <div class="bi-text">
                                                <a href="/blogs/<?= htmlspecialchars($item['id']); ?>">
                                                    <h4><?= htmlspecialchars($item['title']) ?></h4>
                                                </a>
                                                <p><?= $item['categories_post_name'] ?><span>- 19 Tháng 5, 2019</span></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <nav>
                                <ul class="pagination justify-content-center">
                                    <?php
                                    $paginationRange = 2;
                                    $startPage = max(1, $currentPage - $paginationRange);
                                    $endPage = min($totalFilteredPages, $currentPage + $paginationRange);

                                    if ($currentPage > 1) {
                                        echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '&search=' . urlencode($searchKeyword) . '">&laquo;</a></li>';
                                    } else {
                                        echo '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
                                    }

                                    if ($startPage > 2) {
                                        echo '<li class="page-item"><a class="page-link" href="?page=1&search=' . urlencode($searchKeyword) . '">1</a></li>';
                                        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                    }

                                    for ($i = $startPage; $i <= $endPage; $i++) {
                                        $activeClass = ($i == $currentPage) ? 'active' : '';
                                        echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?page=' . $i . '&search=' . urlencode($searchKeyword) . '">' . $i . '</a></li>';
                                    }

                                    if ($endPage < $totalFilteredPages - 1) {
                                        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                        echo '<li class="page-item"><a class="page-link" href="?page=' . $totalFilteredPages . '&search=' . urlencode($searchKeyword) . '">' . $totalFilteredPages . '</a></li>';
                                    }

                                    if ($currentPage < $totalFilteredPages) {
                                        echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '&search=' . urlencode($searchKeyword) . '">&raquo;</a></li>';
                                    } else {
                                        echo '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
                                    }
                                    ?>
                                </ul>
                            </nav>
                        <?php else : ?>
                            <h4 class="text-center text-danger">Không có dữ liệu</h4>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}
?>
