<?php
namespace App\admin\controller;
use App\admin\model\BooksModel;
class BookController extends controller
{
    private $BookController;
    public function __construct()
    {
        $this->BookController = new BooksModel(); // Khởi tạo đối tượng BooksModel
    }

    public function ListBooks()
    {
        $BooksModel = new BooksModel();
        $Books = $BooksModel->getAll(); // Gọi phương thức getAllProducts
        return $this-> view('admin.books');
    }

    public function FormAddBook(){
        return $this->view('admin.admin-add-book');
    }

    public function Add($params){
        if(isset($_POST['add_product'])){
            $params=[];
            foreach($_POST as $key => $value){
                if($key != 'add_product'){
                    $params[] = $value;
                }
            }
            $this->BookController->add($params);

        }
    }

    
}

?>