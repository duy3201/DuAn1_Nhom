<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');

if (!isset($_COOKIE['carts_detail'])) {
    setcookie('carts_detail', json_encode([]), time() + (86400 * 30 * 12), "/"); // Cookie tồn tại 365 ngày
}

use App\Helpers\AuthHelper;
use App\Route;

require_once 'vendor/autoload.php';

require_once 'App/Views/index.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//phải giải phong ấn dòng code này để thức tỉnh bản năng
// giải phong ấn

AuthHelper::middleware();
 
require_once 'config.php';



// *** Client
Route::get('/', 'App\Controllers\Client\HomeController@index');
Route::get('/products', 'App\Controllers\Client\ProductController@index');
Route::get('/products/{id}', 'App\Controllers\Client\ProductController@detail');
Route::get('/products/categories/{id}', 'App\Controllers\Client\ProductController@getProductByCategory');
Route::get('/auction/{id}', 'App\Controllers\Client\HomeController@detailAuction');
Route::post('/auction/{id}', 'App\Controllers\Client\HomeController@placeBid');

//blog
Route::get('/blogs','App\Controllers\Client\BlogController@index');
Route::get('/blogs/{id}', 'App\Controllers\Client\BlogController@detail');
Route::get('/blogs/categories/{id}', 'App\Controllers\Client\BlogController@getPostByCategory');

// Thêm route cho việc thêm sản phẩm vào giỏ hàng
// Thêm sản phẩm vào giỏ
Route::post('/products/cart/add', 'App\Controllers\Client\CartController@addToCart');
Route::post('/cart/add', 'App\Controllers\Client\CartController@addToCart');

// Hiển thị giỏ hàng
Route::get('/cart', 'App\Controllers\Client\CartController@viewCart');

// Xóa sản phẩm khỏi giỏ hàng
Route::get('/cart/remove/{id}', 'App\Controllers\Client\CartController@removeFromCart');

// Cập nhật số lượng sản phẩm
Route::post('/cart/update', 'App\Controllers\Client\CartController@updateCart');

Route::post('/order/create', 'App\Controllers\Client\OrderController@create');
Route::get('/order/thankyou', 'App\Controllers\Client\OrderController@thankyou');

Route::get('/register','App\Controllers\Client\AuthController@register');
Route::post('/register','App\Controllers\Client\AuthController@registerAction');
Route::get('/login','App\Controllers\Client\AuthController@login');
Route::post('/login','App\Controllers\Client\AuthController@loginAction');
Route::get('/logout','App\Controllers\Client\AuthController@logout');
Route::get('/users/{id}','App\Controllers\Client\AuthController@edit');
Route::put('/users/{id}','App\Controllers\Client\AuthController@update');
// GET 
Route::get('/transaction_history/{id}', 'App\Controllers\Client\AuthController@transaction_history');

Route::get('/change-password','App\Controllers\Client\AuthController@changePassword');
Route::put('/change-password','App\Controllers\Client\AuthController@changePasswordAction');

Route::get('/forgot-password','App\Controllers\Client\AuthController@resetPassword');
Route::put('/forgot-password','App\Controllers\Client\AuthController@resetPasswordAction');

Route::get('/reset-password','App\Controllers\Client\AuthController@resetPassword');
Route::put('/reset-password','App\Controllers\Client\AuthController@resetPasswordAction');

Route::get('/contact','App\controllers\Client\PostController@Contact');
Route::post('/contact','App\controllers\Client\PostController@PostContact');

Route::get('/introduce','App\controllers\Client\HomeController@introduce');



Route::get('/detail', 'App\Controllers\Client\ProductController@detail');
Route::post('/detail', 'App\Controllers\Client\PostController@DetailContact');

Route::get('/edit','App\Controllers\Client\AuthController@edit');


Route::get('/CheckOut', 'App\Controllers\Client\ProductController@CheckOut');

Route::get('/forgot-password','App\Controllers\Client\AuthController@forgotPassword');
Route::post('/forgot-password','App\Controllers\Client\AuthController@forgotPasswordAction');


// *** Comment 
Route::post('/comments', 'App\Controllers\Client\CommentController@store');
Route::put('/comments/{id}', 'App\Controllers\Client\CommentController@update');
Route::delete('/comments/{id}', 'App\Controllers\Client\CommentController@delete');

// *** Admin

Route::get('/admin', 'App\Controllers\Admin\HomeController@index');

//  *** Category
// GET /categories (lấy danh sách loại sản phẩm)
Route::get('/admin/categoryproduct', 'App\Controllers\Admin\CategoryController@index');

// GET /categories/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/categoryproduct/createcategory', 'App\Controllers\Admin\CategoryController@create');

// POST /categories (tạo mới một loại sản phẩm)
Route::post('/admin/categoryproduct', 'App\Controllers\Admin\CategoryController@store');

// GET /categories/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/categoryproduct/{id}', 'App\Controllers\Admin\CategoryController@edit');

// PUT /categories/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/categoryproduct/{id}', 'App\Controllers\Admin\CategoryController@update');

// DELETE /categories/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/categoryproduct/{id}', 'App\Controllers\Admin\CategoryController@delete');

// Blogs
Route::get('/admin/categoryiespost', 'App\Controllers\Admin\CategoryPostController@index');
Route::get('/admin/categoryiespost/createcategorypost', 'App\Controllers\Admin\CategoryPostController@create');
Route::post('/admin/categoryiespost', 'App\Controllers\Admin\CategoryPostController@store');
Route::get('/admin/categoryiespost/{id}', 'App\Controllers\Admin\CategoryPostController@edit');
Route::put('/admin/categoryiespost/{id}', 'App\Controllers\Admin\CategoryPostController@update');
Route::delete('/admin/categoryiespost/{id}', 'App\Controllers\Admin\CategoryPostController@delete');

Route::get('/admin/posts', 'App\Controllers\Admin\PostController@index');
Route::get('/admin/posts/createpost', 'App\Controllers\Admin\PostController@create');
Route::post('/admin/posts', 'App\Controllers\Admin\PostController@store');
Route::get('/admin/posts/{id}', 'App\Controllers\Admin\PostController@edit');
Route::put('/admin/posts/{id}', 'App\Controllers\Admin\PostController@update');
Route::delete('/admin/posts/{id}', 'App\Controllers\Admin\PostController@delete');


//  *** Product
// GET /Products (lấy danh sách loại sản phẩm)
Route::get('/admin/products', 'App\Controllers\Admin\ProductController@index');




// GET /products/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/products/createproduct', 'App\Controllers\Admin\ProductController@create');

// POST /products (tạo mới một loại sản phẩm)
Route::post('/admin/products', 'App\Controllers\Admin\ProductController@store');

// GET /products/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/products/{id}', 'App\Controllers\Admin\ProductController@edit');

// PUT /products/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/products/{id}', 'App\Controllers\Admin\ProductController@update');

// DELETE /products/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/products/{id}', 'App\Controllers\Admin\ProductController@delete');


//  *** Product Variants
// GET /Products (lấy danh sách loại sản phẩm)
Route::get('/admin/productvariants', 'App\Controllers\Admin\ProductVariantController@index');

// GET /products/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/productvariants/createvariant', 'App\Controllers\Admin\ProductVariantController@create');

// POST /products (tạo mới một loại sản phẩm)
Route::post('/admin/productvariants', 'App\Controllers\Admin\ProductVariantController@store');

// GET /products/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/productvariants/{id}', 'App\Controllers\Admin\ProductVariantController@edit');

// PUT /products/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/productvariants/{id}', 'App\Controllers\Admin\ProductVariantController@update');

// DELETE /products/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/productvariants/{id}', 'App\Controllers\Admin\ProductVariantController@delete');

//  *** Comment
// GET /Comment (lấy danh sách bình luận)
Route::get('/admin/comments', 'App\Controllers\Admin\CommentController@index');

// GET /Comment/{id} (lấy chi tiết bình luận với id cụ thể)
Route::get('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@edit');

// PUT /Comment/{id} (update bình luận với id cụ thể)
Route::put('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@update');

// DELETE /Comment/{id} (delete bình luận với id cụ thể)
Route::delete('/admin/comments/{id}', 'App\Controllers\Admin\CommentController@delete');


//  *** Users
// GET /users (lấy danh sách người dùng)
Route::get('/admin/users', 'App\Controllers\Admin\UserController@index');

// GET /users/create (hiển thị form thêm người dùng)
Route::get('/admin/users/createuser', 'App\Controllers\Admin\UserController@create');

// POST /users (tạo mới một người dùng)
Route::post('/admin/users', 'App\Controllers\Admin\UserController@store');

// GET /users/{id} (lấy chi tiết người dùng với id cụ thể)
Route::get('/admin/users/{id}', 'App\Controllers\Admin\UserController@edit');




// PUT /users/{id} (update người dùng với id cụ thể)
Route::put('/admin/users/{id}', 'App\Controllers\Admin\UserController@update');

// DELETE /users/{id} (delete người dùng với id cụ thể)
Route::delete('/admin/users/{id}', 'App\Controllers\Admin\UserController@delete');


// *** Auctions

// GET /auctions (lấy danh sách đấu giá)
Route::get('/admin/auctions', 'App\Controllers\Admin\AuctionController@index');

// GET /auctions/create (hiển thị form thêm đấu giá)
Route::get('/admin/auctions/create', 'App\Controllers\Admin\AuctionController@create');

// POST /auctions (tạo mới một đấu giá)
Route::post('/admin/auctions', 'App\Controllers\Admin\AuctionController@store');

// GET /auctions/{id} (lấy chi tiết đấu giá với id cụ thể)
Route::get('/admin/auctions/{id}', 'App\Controllers\Admin\AuctionController@edit');

// PUT /auctions/{id} (update đấu giá với id cụ thể)
Route::put('/admin/auctions/{id}', 'App\Controllers\Admin\AuctionController@update');

// DELETE /auctions/{id} (xóa đấu giá với id cụ thể)
Route::delete('/admin/auctions/{id}', 'App\Controllers\Admin\AuctionController@delete');



Route::dispatch($_SERVER['REQUEST_URI']);


