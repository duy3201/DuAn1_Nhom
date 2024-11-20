<?php

namespace App\Controllers\Client;
use App\Models\Category;
use App\Models\Product;
use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Home;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Card;
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
        $product = new Product();
        $products = $product->getAllProductByIsfeature();
        $data = [
            'products' => $products,
        ];
         Header::render();
         Notification::render();
         NotificationHelper::unset();
        Home::render($data);
         Footer::render();



    }
    public static function blogs()
    {
        Header::render();
        Blogs::render();
        Footer::render();
    }
    public static function card()
    {
        Header::render();
        Card::render();
        Footer::render();
    }

    public static function contact()
    {
        Header::render();
        Contact::render();
        Footer::render();
    }

    public static function introduce(): void
    {
        Header::render();
        Introduce::render();
        Footer::render();
    }
}
