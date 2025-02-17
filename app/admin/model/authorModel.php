<?php 
namespace App\admin\Model;
use App\admin\model\baseModels;
class AuthorModel extends baseModels{
    protected $table = 'authors';
    public function __construct(){
        parent::__construct();
    }

    
}
?>