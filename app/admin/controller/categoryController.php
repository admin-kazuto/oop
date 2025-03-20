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
        // $categoies = $this->CategoryController->getAll();
        // return $this->view('admin.categiory.category');
    }

    public function FormAddCategory()
    {
        return $this->view('admin.admin-add-category');
    }

    public function AddCategory(){
        if(isset($_POST['add_category'])){
            $params = [];
            foreach($_POST as $key => $value){
                if($key != 'add_category'){
                    $params[] = $value;
                }
            }
            // $this->CategoryController->add($params);
        }
    }
}
