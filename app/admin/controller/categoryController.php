<?php

namespace App\admin\controller;

use App\admin\Model\categoryModel;

class CategoryController extends controller
{
    private $CategoryController; // Đổi tên biến cho rõ ràng

    public function __construct()
    {
        $this->CategoryController = new categoryModel(); // Khởi tạo đối tượng productsModel
    }


    public function ListCategory()
    {
        $categories = $this->CategoryController->getAllCategory();
        return $this->view('admin.category.category', compact('categories'));
    }

    public function FormAddCategory()
    {
        return $this->view('admin.category.admin-add-category');
    }

    public function AddCategory()
    {
        if (isset($_POST['add_category']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = [];
            foreach ($_POST as $key => $value) {
                if ($key != 'add_category') {
                    $params[] = strip_tags($value);
                }
            }
            if($this->CategoryController->isCategoryExist($params[0])){
                notification('error', 'Thể loại đã tồn tại', 'form-add-category');
            } else{
                if(count($params) == 2 && !empty($params[0]) && !empty($params[1])){
                    $this->CategoryController->AddCategory($params);
                    notification('success', 'Thêm thể loại thành công', 'form-add-category');
                } else {
                    notification('error', 'Vui lòng nhập đầy đủ thông tin', 'form-add-category');
                }
            }


        }
    }
}
