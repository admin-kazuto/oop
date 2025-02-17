<?php
namespace App\admin\controller;
use App\admin\model\productsModel;
class ProductController extends controller
{
    private $productController; // Đổi tên biến cho rõ ràng
    public function __construct()
    {
        $this->productController = new productsModel(); // Khởi tạo đối tượng productsModel
    }

    public function ListProduct()
    {
        $productsModel = new productsModel();
        $products = $productsModel->getAll(); // Gọi phương thức getAllProducts
        // include __DIR__ . '/../../resources/views/admin/product.php'; // Include file view
        return $this-> view('admin.books');
    }

    public function AddProduct(){
        
    }

    
}

?>