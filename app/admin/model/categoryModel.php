<?php 
namespace App\admin\model; // Sửa namespace thành App\Models

use App\admin\Model\baseModels;
class categoryModel extends baseModels
{
    protected $table = 'categories';

    public function __construct(){  
        parent::__construct();
    }


}

?>