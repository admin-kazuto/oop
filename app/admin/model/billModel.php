<?php

namespace App\admin\model;

use App\admin\Model\Model;

class BillModel extends Model
{
    protected $table = 'orders';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllBill()
    {
        $this->setSQL("SELECT *, {$this->table}.created_at as created FROM {$this->table} JOIN users ON orders.user_id = users.user_id;");
        return $this->all();
    }

    public function getBillById($params)
    {
        $this->setSQL("SELECT *, orders.created_at as created FROM orders JOIN users ON orders.user_id = users.user_id WHERE orders.order_id = ?;");
        return $this->first([$params]);
    }
}
