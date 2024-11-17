<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');

use App\Route;

require_once 'vendor/autoload.php';

require_once 'App/Views/index.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



require_once 'config.php';



// *** Client
Route::get('/', 'App\Controllers\Client\HomeController@index');
Route::get('/products', 'App\Controllers\Client\ProductController@index');
// Route::get('/products/{id}', 'App\Controllers\Client\ProductController@detail');
Route::get('/register','App\Controllers\Client\AuthController@register');
Route::post('/register','App\Controllers\Client\AuthController@registerAction');
Route::get('/login','App\Controllers\Client\AuthController@login');
Route::post('/login','App\Controllers\Client\AuthController@loginAction');
Route::get('/card','App\Controllers\Client\HomeController@card');
Route::get('/contact','App\controllers\Client\HomeController@contact');
Route::get('/introduce','App\controllers\Client\HomeController@introduce');

Route::get('/blogs','App\Controllers\Client\HomeController@blogs');

Route::get('/detail', 'App\Controllers\Client\ProductController@detail');

Route::get('/CheckOut', 'App\Controllers\Client\ProductController@CheckOut');

Route::get('/forgot-password','App\Controllers\Client\AuthController@forgotPassword');
Route::post('/forgot-password','App\Controllers\Client\AuthController@forgotPasswordAction');

// *** Admin

Route::get('/admin', 'App\Controllers\Admin\HomeController@index');

//  *** Category
// GET /categories (lấy danh sách loại sản phẩm)
Route::get('/admin/categories', 'App\Controllers\Admin\CategoryController@index');

// GET /categories/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/categories/create', 'App\Controllers\Admin\CategoryController@create');

// POST /categories (tạo mới một loại sản phẩm)
Route::post('/admin/categories', 'App\Controllers\Admin\CategoryController@store');

// GET /categories/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@edit');

// PUT /categories/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@update');

// DELETE /categories/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@delete');

// Blogs
Route::get('/admin/categoriespost', 'App\Controllers\Admin\CategoryPostController@index');
Route::get('/admin/categoriespost/create', 'App\Controllers\Admin\CategoryPostController@create');
Route::post('/admin/categoriespost', 'App\Controllers\Admin\CategoryPostController@store');
Route::get('/admin/categoriespost/{id}', 'App\Controllers\Admin\CategoryPostController@edit');
Route::put('/admin/categoriespost/{id}', 'App\Controllers\Admin\CategoryPostController@update');
Route::delete('/admin/categoriespost/{id}', 'App\Controllers\Admin\CategoryPostController@delete');

Route::get('/admin/post', 'App\Controllers\Admin\PostController@index');
Route::get('/admin/post/create', 'App\Controllers\Admin\PostController@create');
Route::post('/admin/post', 'App\Controllers\Admin\PostController@store');
Route::get('/admin/post/{id}', 'App\Controllers\Admin\PostController@edit');
Route::put('/admin/post/{id}', 'App\Controllers\Admin\PostController@update');
Route::delete('/admin/post/{id}', 'App\Controllers\Admin\PostController@delete');

//  *** Product
// GET /Products (lấy danh sách loại sản phẩm)
Route::get('/admin/products', 'App\Controllers\Admin\ProductController@index');

// GET /products/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/products/create', 'App\Controllers\Admin\ProductController@create');

// POST /products (tạo mới một loại sản phẩm)
Route::post('/admin/products', 'App\Controllers\Admin\ProductController@store');

// GET /products/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/products/{id}', 'App\Controllers\Admin\ProductController@edit');

// PUT /products/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/products/{id}', 'App\Controllers\Admin\ProductController@update');

// DELETE /products/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/products/{id}', 'App\Controllers\Admin\ProductController@delete');



//  *** Users
// GET /users (lấy danh sách người dùng)
Route::get('/admin/users', 'App\Controllers\Admin\UserController@index');

// GET /users/create (hiển thị form thêm người dùng)
Route::get('/admin/users/create', 'App\Controllers\Admin\UserController@create');

// POST /users (tạo mới một người dùng)
Route::post('/admin/users', 'App\Controllers\Admin\UserController@store');

// GET /users/{id} (lấy chi tiết người dùng với id cụ thể)
Route::get('/admin/users/{id}', 'App\Controllers\Admin\UserController@edit');

// PUT /users/{id} (update người dùng với id cụ thể)
Route::put('/admin/users/{id}', 'App\Controllers\Admin\UserController@update');

// DELETE /users/{id} (delete người dùng với id cụ thể)
Route::delete('/admin/users/{id}', 'App\Controllers\Admin\UserController@delete');

Route::dispatch($_SERVER['REQUEST_URI']);
