<?php 
namespace App\admin\Controller;
use App\admin\Model\AuthorModel;
class AuthorController extends controller{
    private $AuthorController;
    public function __construct(){
        $this -> AuthorController = new AuthorModel();
    }

    public function ListAuthor(){
        $authorModel = new AuthorModel();
        $author = $authorModel-> getAll();
        return $this-> view('admin.author');
    }

    public function add($params){
        $authorModel = new AuthorModel();
        
    }
}
?>