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

    public function DetailBook($params){
        return $this -> view('admin.admin-detail-book');
    }

    public function FormEditBook($params){
        return $this -> view('admin.admin-edit-book');
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
                // Lấy phần mở rộng của file
                $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
                // Danh sách định dạng được phép
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
                // Giới hạn dung lượng (2MB)
                $maxSize = 2 * 1024 * 1024;
                if (!in_array($fileType, $allowedTypes)) {
                    notification('error', 'Chỉ hỗ trợ định dạng jpg, jpeg, png, gif, bmp, webp', 'form-add-book');
                } elseif ($_FILES['image']['size'] > $maxSize) {
                    notification('error', 'Dung lượng file khó qua 2MB', 'form-add-book');
                } else {
                    $params[] = $fileName;
                    move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
                }
                if (count($params) == 7 && !empty($params[0]) && !empty($params[1]) && !empty($params[2]) && !empty($params[3]) && !empty($params[4]) && !empty($params[5]) && !empty($params[6]) ) {
                    $this->BookController->AddBook($params);
                    notification('success', 'Thêm sách thành công', 'form-add-book');
                } else {
                    notification('error', 'Vui lòng nhập đầy đủ thông tin', 'form-add-book');
                }
            }
        }
    }

    public function EditBook($params)
    {
        // $dataImage = $this -> BookController -> getBookById($params);
        // if (isset($_POST['saveEditBook'])) {
        //     $updateData = [$params];
        //     foreach ($_POST as $key => $value) {
        //         if ($key != 'saveEditBook') {
        //             $updateData[] = $value;
        //         }
        //     }
        //     if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        //         $uploadDir = __DIR__ . '/../../../resources/public/images/upload/';
        //         $fileName = basename($_FILES['image']['name']);
        //         $uploadFile = $uploadDir . $fileName;

        //         if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        //             $updateData[] = $fileName;
        //         } else {
        //             $updateData[] = null;
        //         }
        //     }

        //     $this->BookController->UpdateBook($updateData);
        // }
       
    }

    public function DeleteBook($params)
    {
        $book = $this->BookController->getBookById($params);
        if ($book->status == 1) {
            $this->BookController->DeleteBook($params);
            notification('success', 'Xóa sách thành công', 'books');
            exit();
        } else {
            notification('error', 'Đéo xóa được, mù à', 'books');
            exit();
        }
    }

    public function RestoreBook($params){
        $book = $this->BookController->getBookById($params);
        if ($book-> status == 0){
            $this -> BookController -> RestoreBook($params);
            notification('success', 'Đã khôi phục sách', 'books');
        } if ($book -> status == 1){
            notification('error', 'Sách này đã khôi phục rồi', 'books');
        }
    }
}
