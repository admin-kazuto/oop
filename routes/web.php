<?php
// Khởi tạo Router
use Bramus\Router\Router;

$router = new Router();

// $router->setBasePath('/admin');


use App\admin\controller\dashboardController;
use App\admin\controller\BookController;
use App\admin\controller\CategoryController;
use App\admin\controller\AuthorController;
use App\admin\controller\BillController;
use App\client\controller\HomeController;

// Khởi tạo Controller admin
$dashboardController = new dashboardController();
$bookController = new BookController();
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
$router->mount('', function () use (
    $router,
    $dashboardController,
    $bookController,
    $categoryController,
    $billController,
    $authorController,
    $homeController,
) {
    // $router -> get('/','App\\controller\\dashboardController@index');
    $router->get('dashboard', function () use ($dashboardController) {
        $dashboardController->index();
    });
    $router->get('/books', function () use ($bookController) {
        $bookController->ListBooks();
    });

    $router->get('/form-add-book', function () use ($bookController) {
        $bookController->FormAddBook();
    });

    $router->post('/add-book', function () use ($bookController) {
        $bookController->AddBook();
    });

    $router->get('/form-edit-book/{id}', function ($params) use ($bookController) {
        $bookController->FormEditBook($params);
    });
    $router->post('/edit-book/{id}', function ($params) use ($bookController) {
        $bookController->EditBook($params);
    });

    $router->get('/delete-book/{id}', function ($params) use ($bookController) {
        $bookController->DeleteBook($params);
    });

    $router->get('/restore-book/{id}', function ($params) use ($bookController) {
        $bookController->RestoreBook($params);
    });

    $router->get('/detail-book/{id}', function ($params) use ($bookController) {
        $bookController->DetailBook($params);
    });

    $router->get('/category', function () use ($categoryController) {
        $categoryController->ListCategory();
    });

    $router->get('/form-add-category', function () use ($categoryController) {
        $categoryController->FormAddCategory();
    });

    $router->post('/add-category', function () use ($categoryController) {
        $categoryController->AddCategory();
    });

    $router->get('/bill', function () use ($billController) {
        $billController->ListBill();
    });

    $router->get('/author', function () use ($authorController) {
        $authorController->ListAuthor();
    });

    $router->get('/form-add-author', function () use ($authorController) {
        $authorController->FormAddAuthor();
    });

    $router->post('/add-author', function () use ($authorController) {
        $authorController->AddAuthor();
    });

    $router->get('/', function () use ($homeController) {
        $homeController->Home();
    });
});
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
