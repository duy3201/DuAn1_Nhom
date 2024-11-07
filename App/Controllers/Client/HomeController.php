<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Home;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Card;
use App\Views\Client\Pages\Product\Products;

class HomeController
{
    // hiển thị danh sách
    public static function index()
    {
        Header::render();
        Home::render();
        Products::render();
        Footer::render();
    }
    public static function card(){
        Header::render();
        Card::render();
        Footer::render();
    }
}
