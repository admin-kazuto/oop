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
        $Books = $this->BookController->GetAll();
        return $this->view('admin.books');
    }

    public function FormAddBook()
    {
        $ListCategories = $this->BookController->GetAllCategories();
        $ListAuthor = $this->BookController->GetAllAuthor();
        return $this->view('admin.admin-add-book', compact('ListCategories', 'ListAuthor'));
    }

    public function AddBook()
    {
        if (isset($_POST['save'])) {
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
            $this->BookController->AddBook($params);
        }
    }
}
