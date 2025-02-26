<?php 
namespace App\Client\Model;
use App\admin\model\Model;
class HomeModel extends Model{
    protected $table = 'books';
    public function __construct(){
        parent::__construct();
    }
    
}
?>