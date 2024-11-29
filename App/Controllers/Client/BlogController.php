<?php

namespace App\Controllers\Client;

// use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Models\Category;
// use App\Models\log;
use App\Models\CategoryPost;
use App\Models\Post;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Blogs\Detail;
use App\Views\Client\Pages\Blogs\Category as PostCategory;
use App\Views\Client\Pages\CheckOut;
use App\Views\Client\Pages\Blogs\Index as BlogIndex;

class BlogController
{
    // hiển thị danh sách
    public static function index()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $categoriesmenu = $category->getAllCategoryByStatus();

        $post = new Post();
        $posts = $post->getAllPostJoinCategoryPost();



        $postCategory = new CategoryPost();
        $postCategories = $postCategory->getAllCategoryPostByStatus();

        $data = [
            'posts' => $posts,
            'categories_post' => $postCategories,
            'categories' => $categories,
            'categoriesmenu' => $categoriesmenu
        ];
        Header::render($data);
        Notification::render();
        NotificationHelper::unset();
        BlogIndex::render($data);
        Footer::render();
    }
    public static function detail($id)
{

    
    $postCategory = new CategoryPost();
    $postCategories = $postCategory->getAllCategoryPostByStatus();
    $categories = new Category();
    $categories = $categories->getAllCategoryByStatus();
    $post = new Post();
    $post_detail = $post->getOnePostByStatus($id);


        if (!$post_detail) {
            NotificationHelper::error('Blog_detail', 'Không thể xem sản phẩm này');
            header('location: /blogs');
            exit;
        }

       

        $data = [
            'categories_post' => $postCategories,
            'posts' => $post_detail,
            'categories' => $categories
            
        ];

        //  $view_result = ViewBlogHelper::cookieView($id, $Blog_detail['view']);

        Header::render($data);
        Notification::render();
        NotificationHelper::unset();
        Detail::render($data);
        Footer::render();
    

    
}

    public static function getPostByCategory($id)
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $postCategory = new CategoryPost();
        $postCategories = $postCategory->getAllCategoryPostByStatus();

        $post = new Post();
        $posts = $post->getAllPostByCategoryAndStatus($id);

        $data = [
            'posts' => $posts,
            'categories_post' => $postCategories,
            'categories' => $categories
        ];

        Header::render($data);
        PostCategory::render($data);
        Footer::render();
    }    public static function CheckOut()
    {
        Header::render();
        CheckOut::render();
        Footer::render();
    }
}
