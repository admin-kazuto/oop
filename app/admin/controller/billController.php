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
        $Bills = $this -> BillController -> getAllBill();
        return $this->view('admin.bill.bill',compact('Bills'));
    }

    function DetailBill($params){
        $Bill = $this -> BillController -> getBillById($params);
        return $this->view('admin.bill.bill-detail',compact('Bill'));
    }
    
}
