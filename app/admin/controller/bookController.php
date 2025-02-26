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
        $Books = $this->BookController->GetAllWithCategoryAndAuthor();
        return $this->view('admin.books', compact('Books'));
    }

    public function FormAddBook()
    {
        $ListCategories = $this->BookController->GetAllCategories();
        $ListAuthor = $this->BookController->GetAllAuthor();
        return $this->view('admin.admin-add-book', compact('ListCategories', 'ListAuthor'));
    }

    public function AddBook()
    {
        if (isset($_POST['save']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = [];
            foreach ($_POST as $key => $value) {
                if ($key != 'save') {
                    $params[] = $value;
                }
            }
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $uploadDir = __DIR__ . '/../../../resources/public/images/upload/';
                $fileName = basename($_FILES['image']['name']);
                $uploadFile = $uploadDir . $fileName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                    $params[] = $fileName;
                } else {
                    $params[] = null;
                }
            }
            if (count($params) == 7 && !empty($params[0]) && !empty($params[1]) && !empty($params[2]) && !empty($params[3]) && !empty($params[4]) && !empty($params[5]) && !empty($params[6])) {
                $this->BookController->AddBook($params);
                notification('success', 'Thêm sách thành công', 'form-add-book');
            } else {
                notification('error', 'Vui lòng nhập đầy đủ thông tin', 'form-add-book');
            }
        }
    }

    public function EditBook($params) {
       if(isset($_POST['saveEditBook'])){
            $updateData = ['id'=>$params];
            foreach($_POST as $key => $value){
                if($key != 'saveEditBook'){
                    $updateData[] = $value;
                }
            }
            // if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
            //     $uploadDir = __DIR__ . '/../../../resources/public/images/upload/';
            //     $fileName = basename($_FILES['image']['name']);
            //     $uploadFile = $uploadDir . $fileName;
            //     if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)){
            //         $updateData[] = $fileName;
            //     }else{
            //         $updateData[] = null;
            //     }
            // } 
            
            var_dump($updateData);
       }
    }

    public function DeleteBook($id) {}
}
