<?php
session_start();
ob_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");

use Dotenv\Dotenv;
use App\admin\controller\dashboardController;
use App\admin\controller\ProductController;
use App\admin\controller\CategoryController;
use App\admin\controller\AuthorController;
use App\admin\controller\BillController;
use App\client\controller\HomeController;


require __DIR__ . '/vendor/autoload.php';

// Load biến môi trường từ .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Bramus\Router\Router;

// Khởi tạo Router
$router = new Router();
// $router->setBasePath('/oop-version-2');

// Khởi tạo Controller admin
$dashboardController = new dashboardController();
$productController = new ProductController();
$categoryController = new CategoryController();
$billController = new BillController;
$authorController = new AuthorController();
//khởi tạo Controller client
$homeController = new homeController();


// $router->get('/', function() use ($dashboardController) {
//     $dashboardController->index();
// });
// $router->get('/product', function() use ($productController) {
//     $productController->ListProduct();
// });

// $router->get('/category', function() use ($categoryController) {
//     $categoryController->ListCategory();
// });

// $router->get('/order', function() use ($orderController) {
//     $orderController->ListOrder();
// });

// Định nghĩa routes
$router->mount('/opp-version-2', function () use (
    $router,
    $dashboardController,
    $productController,
    $categoryController,
    $billController,
    $authorController,
    $homeController,
) {
    // $router -> get('/','App\\controller\\dashboardController@index');
    $router->get('/dashboard', function () use ($dashboardController) {
        $dashboardController->index();
    });
    $router->get('/books', function () use ($productController) {
        $productController->ListProduct();
    });

    $router->get('/category', function () use ($categoryController) {
        $categoryController->ListCategory();
    });

    $router->get('/admin-add-category', function () use ($categoryController) {
        $categoryController->FormAddCategory();
    });

    $router->get('/bill', function () use ($billController) {
        $billController->ListBill();
    });

    $router->get('/author', function () use ($authorController) {
        $authorController->ListAuthor();
    });

    $router->get('/', function () use ($homeController) {
        $homeController->Home();
    });
});
//các phương thức của router 
// Xử lý lỗi 404
$router->set404(function () {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo 'Trang không tồn tại!';
});



//xử lý bên controller('tên router','namespace/tên class @ phương thức')
// $router->get('category','App\\controller\\CategoryController@ListCategory');
// //truyền tham số 
// $router->get('product/{id}','App\\controller\\ProductController@ListProduct');
// Chạy Router
$router->run();
