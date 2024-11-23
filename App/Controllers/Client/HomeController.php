<?php

namespace App\Controllers\Client;
use App\Models\Category;
use App\Models\Product;
use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Home;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Cart;
use App\Views\Client\Pages\Blogs;
use App\Views\Client\Pages\Product\Products;
use App\Views\Client\Pages\Contact;
use App\Views\Client\Pages\Introduce;
// use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
// use App\Views\Client\Pages\Product\Index;
use App\Views\Client\Pages\Product\Category AS ProductCategory;
use App\Views\Client\Pages\CheckOut;
use App\Views\Client\Pages\Product\Index;

class HomeController
{
    // hiển thị danh sách
    public static function index()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $categoriesmenu = $category->getAllCategoryByStatus();

        $product = new Product();
        $products = $product->getAllProductByIsfeature();

        $data = [
            'products' => $products,
            'categories' => $categories,
            'categoriesmenu' => $categoriesmenu
        ];
         Header::render($data);
         Notification::render();
         NotificationHelper::unset();
         Home::render($data);
         Footer::render();
        



    }
    public static function blogs()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $categoriesmenu = $category->getAllCategoryByStatus();

        $product = new Product;
        $products = $product->getAllProductByStatus();

        $data = [
            'products' => $products,
            'categories' => $categories,
            'categoriesmenu' => $categoriesmenu
        ];
        Header::render($data);
        Blogs::render();
        Footer::render();
    }
    public static function cart()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $categoriesmenu = $category->getAllCategoryByStatus();

        $product = new Product;
        $products = $product->getAllProductByStatus();

        $data = [
            'products' => $products,
            'categories' => $categories,
            'categoriesmenu' => $categoriesmenu
        ];
        Header::render($data);
        Cart::render();
        Footer::render();
    }
    

    public static function contact()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $categoriesmenu = $category->getAllCategoryByStatus();

        $product = new Product;
        $products = $product->getAllProductByStatus();

        $data = [
            'products' => $products,
            'categories' => $categories,
            'categoriesmenu' => $categoriesmenu
        ];
        Header::render($data);
        Contact::render();
        Footer::render();
    }

    public static function introduce(): void
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $categoriesmenu = $category->getAllCategoryByStatus();

        $product = new Product;
        $products = $product->getAllProductByStatus();

        $data = [
            'products' => $products,
            'categories' => $categories,
            'categoriesmenu' => $categoriesmenu
        ];
        Header::render($data);
        Introduce::render();
        Footer::render();
    }
}
