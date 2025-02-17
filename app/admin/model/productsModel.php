<?php
namespace App\admin\model; // Sửa namespace thành App\Models

use App\admin\Model\baseModels;

class productsModel extends baseModels 
{
    protected $table = 'books';
    public function __construct()
    {
        parent::__construct();
    }

    public function add($params){
        $sql = "insert into {$this-> table} values (null, :name, :price, :description, :image, :category_id)";
        return $this->execute($sql, $params);
    }
}