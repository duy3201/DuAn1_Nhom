<?php

namespace App\Controllers\Client;

// use App\Helpers\AuthHelper;
// use App\Helpers\NotificationHelper;
// use App\Models\Category;
// use App\Models\Comment;
// // use App\Models\Product;
// use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
// use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
// use App\Views\Client\Pages\Product\Index;
use App\Views\Client\Pages\Product\Products;
use App\Views\Client\Pages\CheckOut;

class ProductController
{
    // hiển thị danh sách
    public static function index()
    {
        Header::render();
        Products::render();
        Footer::render();
    }
    public static function detail(){
        Header::render();
        Detail::render();
        Footer::render();
    }

    public static function CheckOut(){
        Header::render();
        CheckOut::render();
        Footer::render();
    }
}
