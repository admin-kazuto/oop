<?php

namespace App\admin\controller;

use App\admin\model\BooksModel;

class BookController extends controller
{
    private $BookController;
    public function __construct()
    {
        $this->BookController = new BooksModel(); 
    }

    public function ListBooks()
    {
        $Books = $this->BookController->GetAllWithCategoryAndAuthor();
        return $this->view('admin.book.books', compact('Books'));
    }

    public function FormAddBook()
    {
        $ListCategories = $this->BookController->GetAllCategories();
        $ListAuthor = $this->BookController->GetAllAuthor();
        return $this->view('admin.book.admin-add-book', compact('ListCategories', 'ListAuthor'));
    }

    public function DetailBook($params)
    {
        $book = $this->BookController->getBookById($params);
        $authors = $this->BookController->GetAllAuthor();
        $categories = $this->BookController->GetAllCategories();
        return $this->view('admin.book.admin-detail-book', compact('book', 'authors', 'categories'));
    }

    public function FormEditBook($params)
    {
        $book = $this->BookController->getBookById($params);
        $categories = $this->BookController->GetAllCategories();
        $authors = $this->BookController->GetAllAuthor();
        return $this->view('admin.book.admin-edit-book', compact('book', 'categories', 'authors'));
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
                $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
                $maxSize = 2 * 1024 * 1024;
                if (!in_array($fileType, $allowedTypes)) {
                    notification('error', 'Chỉ hỗ trợ định dạng jpg, jpeg, png, gif, bmp, webp', 'form-add-book');
                } elseif ($_FILES['image']['size'] > $maxSize) {
                    notification('error', 'Dung lượng file khó qua 2MB', 'form-add-book');
                } else {
                    $params[] = $fileName;
                    move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
                }
                if (count($params) == 8 && !empty($params[0]) && !empty($params[1]) && !empty($params[2]) && !empty($params[3]) && !empty($params[4]) && !empty($params[5]) && !empty($params[6]) && !empty($params[7])) {
                    $this->BookController->AddBook($params);
                    notification('success', 'Thêm sách thành công', 'form-add-book');
                } else {
                    notification('error', 'Vui lòng nhập đầy đủ thông tin', 'form-add-book');
                }
            }
        }
    }

    public function EditBook($params) // đang lỗi
    {

        $nameImage = $this->BookController->getBookById($params)->image;

        if (isset($_POST['saveEditBook'])) {
            $updateData = [];
            foreach ($_POST as $key => $value) {
                if ($key != 'saveEditBook') {
                    $updateData[] = $value;
                }
            }

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

                $imageType = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
                $imageSize = 6 * 1024 * 1024;
                $uploadDir = __DIR__ . '/../../../resources/public/images/upload/';
                $fileName = basename($_FILES['image']['name']);
                $uploadFile = $uploadDir . $fileName;
                $pathInfo = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if (!in_array($pathInfo, $imageType)) {
                    return    notification('error', 'Không hỗ trợ định dạng', 'books');
                }
                if ($_FILES['image']['size'] > $imageSize) {
                    return      notification('error', 'Dung lượng vượt quá 6MB', 'books');
                }
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                    if ($nameImage != $fileName) {
                        $updateData[] = $fileName;
                        if (!empty($nameImage) && file_exists($uploadDir . $nameImage)) {
                            unlink($uploadDir . $nameImage);
                        }
                    }
                }
            } else {
                $updateData[] = $nameImage;
            }
            if (count($updateData) == 9) {
                $this->BookController->UpdateBook($updateData);
                notification('succes', 'đã được sửa', 'books');
            } else {
                notification('error', 'đéo sửa được hết cứu', 'books');
            }
        }
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

    public function RestoreBook($params)
    {
        $book = $this->BookController->getBookById($params);
        if ($book->status == 0) {
            $this->BookController->RestoreBook($params);
            notification('success', 'Đã khôi phục sách', 'books');
        }
        if ($book->status == 1) {
            notification('error', 'Sách này đã khôi phục rồi', 'books');
        }
    }
}
