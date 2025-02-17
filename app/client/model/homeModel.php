<?php 
namespace App\Client\Model;
use App\admin\model\baseModels;
class HomeModel extends baseModels{
    protected $table = 'books';
    public function __construct(){
        parent::__construct();
    }
    
}
?>