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
        $author = $this->AuthorController->getAll();
        return $this->view('admin.author');
    }
    public function FormAddAuthor(){
        return $this->view('admin.admin-add-author');
    }
    public function AddAuthor()
    {
        if (isset($_POST['add_author'])) {
            $params = [];
            foreach ($_POST as $key => $value) {
                if ($key != 'add_author') {
                    $params[] = $value;
                }
            }
            $this->AuthorController->add($params);
        }
        return $this->view('admin.author');
    }
}
