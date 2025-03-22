<?php 
namespace App\admin\model; // Sửa namespace thành App\Models

use App\admin\Model\Model;
class categoryModel extends Model
{
    protected $table = 'categories';

    public function __construct(){  
        parent::__construct();
    }

    public function getAllCategory(){
        $sql = "SELECT * FROM {$this->table}"; // Mẹo là vào thực trước câu lệnh trong MySQL
        $this->setSQL($sql);
        return $this->all();
    }

    public function isCategoryExist($params){
        $sql = "SELECT * FROM {$this->table} WHERE name = ?";
        $this->setSQL($sql);
        return $this->all([$params]);
    }

    public function addCategory($params){
        $this -> setSQL('INSERT INTO categories (name, description) VALUES (?,?)');
        return $this->execute($params);
    }

}

?>