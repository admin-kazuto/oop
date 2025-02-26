<?php 
namespace App\admin\model; // Sửa namespace thành App\Models

use App\admin\Model\Model;
class categoryModel extends Model
{
    protected $table = 'categories';

    public function __construct(){  
        parent::__construct();
    }


}

?>