<?php

namespace App\admin\model;

use App\admin\Model\baseModels;

class BillModel extends baseModels
{
    protected $table = 'orders';

    public function __construct()
    {
        parent::__construct();
    }

    public function add($params)
    {
        $sql = "INSERT INTO {$this->table} VALUES (?,?,?,?)";
        $this->setSQL($sql);
        return $this->execute([$params]);
    }
}
