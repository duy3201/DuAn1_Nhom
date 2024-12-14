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
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!AuthHelper::checkLogin()) {
            NotificationHelper::error('login_auction', 'Vui lòng đăng nhập để thực hiện đấu giá.');
            header('Location: /login');
            exit;
        }

        // Kiểm tra dữ liệu đầu vào
        if (!isset($_POST['auction_id']) || !isset($_POST['bid_price'])) {
            NotificationHelper::error('invalid_data', 'Dữ liệu không hợp lệ.');
            header('Location: /');
            exit;
        }

        $auction_id = $_POST['auction_id'];
        $user_id = AuthHelper::checkLogin(); // Nếu đã đăng nhập, lấy user_id từ AuthHelper
        $bid_amount = $_POST['bid_price'];

        // Kiểm tra tính hợp lệ của giá đấu
        if (!is_numeric($bid_amount) || $bid_amount <= 0) {
            NotificationHelper::error('invalid_bid', 'Số tiền đấu giá không hợp lệ.');
            header("Location: /auction/{$auction_id}");
            exit;
        }

        $auctionModel = new Auction();
        $auction = $auctionModel->getOneAuction($auction_id);

        // Kiểm tra phiên đấu giá có tồn tại hay không
        if (!$auction) {
            NotificationHelper::error('auction_not_found', 'Phiên đấu giá không tồn tại.');
            header('Location: /');
            exit;
        }

        // Kiểm tra nếu đấu giá đã kết thúc
        if (strtotime($auction['end_time']) <= time()) {
            NotificationHelper::error('auction_ended', 'Phiên đấu giá đã kết thúc. Bạn không thể đấu giá.');
            header("Location: /auction/{$auction_id}");
            exit;
        }

        // Kiểm tra giá đấu
        if ($bid_amount <= $auction['starting_price']) {
            NotificationHelper::error('bid_too_low', 'Giá đấu phải lớn hơn giá khởi điểm.');
            header("Location: /auction/{$auction_id}");
            exit;
        }

        $bidModel = new Bid();

        // Kiểm tra xem giá đấu đã tồn tại hay chưa
        $existingBid = $bidModel->getBidByAmount($auction_id, $bid_amount);
        if ($existingBid) {
            NotificationHelper::error('duplicate_bid', 'Giá đấu đã tồn tại. Vui lòng nhập giá khác.');
            header("Location: /auction/{$auction_id}");
            exit;
        }

        // Thêm giá đấu
        $data = [
            'user_id' => $user_id,
            'auction_id' => $auction_id,
            'bid_amount' => $bid_amount,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $result = $bidModel->createBid($data);

        if ($result) {
            NotificationHelper::success('bid_success', 'Đấu giá thành công!');
            header("Location: /auction/{$auction_id}");
            exit;
        } else {
            NotificationHelper::error('bid_error', 'Có lỗi khi tạo đấu giá. Vui lòng thử lại.');
            header("Location: /auction/{$auction_id}");
            exit;
        }
    }
}
