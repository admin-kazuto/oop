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
}
