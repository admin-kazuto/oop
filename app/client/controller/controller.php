<?php 
namespace App\client\controller;
use eftec\bladeone\BladeOne;
class controller{
    //tạo phương thức giúp render 
    //template blade và truyền dữ liệu 
    protected function view($viewFile, $data = []) {
        //xác định đường dẫn chứa file view
        $view = __DIR__.'/../../../resources/views/';
        //xác định file cache
        $cache = __DIR__.'/../../../storage/cache/';
        //tạo đối tượng bladeOne 
        $blade = new BladeOne($view, $cache, BladeOne::MODE_DEBUG);
        //trả về nội dụng theme
        echo $blade->run($viewFile, $data);
    }
}
?>