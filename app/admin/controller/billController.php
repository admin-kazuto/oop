<?php

namespace App\admin\controller;

use App\admin\Model\BillModel;

class BillController extends controller
{
    private $BillController;
    public function __construct()
    {
        $this->BillController = new BillModel();
    }
    public function ListBill()
    {
        $BillModels = new BillModel();
        $Bills = $BillModels->getAll();
        return $this->view('admin.bill');
    }
}
