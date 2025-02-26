<?php 
namespace App\admin\Model;
use App\admin\model\Model;
class AuthorModel extends Model{
    protected $table = 'authors';
    public function __construct(){
        parent::__construct();
    }

    public function getAllAuthor(){
        $sql = "SELECT * FROM {$this->table}";
        $this->setSQL($sql);
        return $this->all();
    }
}
?>