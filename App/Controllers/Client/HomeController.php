<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Models\Auction;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Helpers\NotificationHelper;
use App\Models\Bid;
use App\Views\Client\Components\Notification;
use App\Views\Client\DetailAuction;
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
use App\Views\Client\Pages\Product\Category as ProductCategory;
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

        $post = new Post();
        $posts = $post->getAllPostByLimit();

        $auction = new Auction();
        $allAuctions = $auction->getAllAuctionJoinProductName();

        // Cập nhật trạng thái của các phiên đấu giá
        $auction->updateAuctionStatus();

        // Lọc các phiên đấu giá có trạng thái "Đã mở"
        $openAuctions = array_filter($allAuctions, function ($auction) {
            return $auction['status'] == Auction::STATUS_OPEN;
        });

        $data = [
            'auctions' => $openAuctions,
            'posts' => $posts,
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

    // detailAucotion
    public static function detailAuction($id)
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $categoriesmenu = $category->getAllCategoryByStatus();

        $auction = new Auction();
        $auctions_detail = $auction->getOneAuctionByStatus($id);
        $auctionHistory = $auction->getAuctionHistory($id);

        $data = [
            'auctions' => $auctions_detail,
            'auction_history' => $auctionHistory,
            'categories' => $categories,
            'categoriesmenu' => $categoriesmenu
        ];
        Header::render($data);
        DetailAuction::render($data);
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

    public static function placeBid()
{
    // Kiểm tra nếu người dùng đã đăng nhập
    if (!AuthHelper::checkLogin()) {
        echo "Vui lòng đăng nhập để thực hiện đấu giá.";
        exit;
    }

    // Kiểm tra dữ liệu POST
    if (!isset($_POST['auction_id']) || !isset($_POST['bid_price'])) {
        echo "Dữ liệu không hợp lệ.";
        exit;
    }

    // Lấy dữ liệu từ form
    $auction_id = $_POST['auction_id'];
    $user_id = AuthHelper::checkLogin(); // Lấy ID người dùng
    $bid_amount = $_POST['bid_price']; // Số tiền đấu giá

    // Kiểm tra nếu giá đấu hợp lệ
    if (!is_numeric($bid_amount) || $bid_amount <= 0) {
        echo "Số tiền đấu giá không hợp lệ.";
        exit;
    }

    // Lấy chi tiết đấu giá từ model
    $auctionModel = new Auction();
    $auction = $auctionModel->getOneAuction($auction_id);

    // Kiểm tra nếu đấu giá tồn tại
    if (!$auction) {
        echo "Phiên đấu giá không tồn tại.";
        exit;
    }

    // Kiểm tra nếu giá đấu lớn hơn giá khởi điểm
    if ($bid_amount <= $auction['starting_price']) {
        echo "Giá đấu phải lớn hơn giá khởi điểm.";
        exit;
    }

    // Kiểm tra nếu đấu giá đã kết thúc
    $currentTime = date('Y-m-d H:i:s');
    if ($auction['end_time'] < $currentTime) {
        echo "Phiên đấu giá đã kết thúc.";
        exit;
    }

    // Tạo bid mới
    $bidModel = new Bid();
    $data = [
        'user_id' => $user_id,
        'auction_id' => $auction_id,
        'bid_amount' => $bid_amount,
        'created_at' => date('Y-m-d H:i:s')
    ];

    $result = $bidModel->createBid($data);

    // Kiểm tra nếu tạo bid thành công
    if ($result) {
        // Chuyển hướng đến trang chi tiết đấu giá
        header("Location: /auction/{$auction_id}");
        exit;
    } else {
        // Thông báo lỗi và giữ lại trang đấu giá
        echo "Có lỗi khi tạo đấu giá. Vui lòng thử lại.";
        
    }
}

}
