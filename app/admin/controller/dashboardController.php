<?php
namespace App\admin\controller;
class dashboardController extends controller
{
    public function index()
    {
        // Đường dẫn tới file view
        return $this->view('admin.dashboard');
       
    }
}
