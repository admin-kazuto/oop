<?php

namespace App\admin\Controller;

use App\admin\Model\AuthorModel;


class AuthorController extends controller
{
    private $AuthorController;
    public function __construct()
    {
        $this->AuthorController = new AuthorModel();
    }

    public function ListAuthor()
    {
        $authors = $this->AuthorController->getAllAuthor();
        return $this->view('admin.author.author', compact('authors'));
    }
    public function FormAddAuthor()
    {
        return $this->view('admin.author.admin-add-author');
    }
    public function AddAuthor()
    {
        if (isset($_POST['add_author']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = [];
            foreach ($_POST as $key => $value) {
                if ($key != 'add_author') {
                    $params[] = strip_tags($value);
                }
            }
            if ($this->AuthorController->isAuthorExist($params[0], $params[1])) {
                notification('error', 'Tác giả đã tồn tại', 'form-add-author');
            } else {
                if (count($params) == 3 && !empty($params[0]) && !empty($params[1]) && !empty($params[2])) {
                    $this->AuthorController->AddAuthor($params);
                    notification('success', 'Thêm tác giả thành công', 'form-add-author');
                } else {
                    notification('error', 'Vui lòng nhập đầy đủ thông tin', 'form-add-author');
                }
            }
        }
    }

    public function DeleteAuthor($params){
        $status = $this->AuthorController->getAuthorById($params)-> status;
        if($status == 1){
            $this->AuthorController->DeleteAuthor($params);
            notification('success', 'Xóa tác giả thành công', 'authors');
        } else {
            notification('error', 'Tác giả đã bị xóa rồi thằng mù', 'authors');
        }
        
    }

    public function RestoreAuthor($params){
        $status = $this->AuthorController->getAuthorById($params)-> status;
        if($status == 0){
            $this->AuthorController->RestoreAuthor($params);
            notification('success', 'Khoi phuc tac gia thanh cong', 'authors');
        } else {
            notification('error', 'Tac gia da bi khoi phuc roi', 'authors');
        }
    }

    public function FormEditAuthor($params){
        $author = $this -> AuthorController -> getAuthorById($params);
        return $this->view('admin.author.admin-edit-author', compact('author'));
    }

}
