<?php

namespace App\admin\model;

use App\admin\Model\Model;

interface CRUDBaseModels
{
    public function Add($params);
    public function Delete($params);
    public function Update($params);
    public function GetId($params);
    public function GetAll();
}

abstract class baseModels extends Model implements CRUDBaseModels
{
    //phương thức truy vấn
    protected $table;
    // Thuộc tính kết nối cơ sở dữ liệu
    // Phương thức khởi tạo kết nối CSDL thông qua Model
    // Truy vấn CSDL
    // Truy vấn lấy tất cả thông tin
    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}"; // Mẹo là vào thực trước câu lệnh trong MySQL
        $this->setSQL($sql);
        return $this->all();
    }
    // Truy vân theo product_id
    public function getId($params)
    {
        $sql = "SELECT * FROM {$this->table} WHERE product_id = ?";
        $this->setSQL($sql);
        return $this->first([$params]);
    }
    // Thao tác với CSDL 
    // Thêm
    public function add($params)
    {
        $sql = "INSERT INTO {$this->table} VALUES (?,?,?,?)";
        $this->setSQL($sql);
        return $this->execute([$params]);
    }
    // Sửa
    public function update($params)
    {
        $sql = "UPDATE {$this->table} SET product_name = ?, gia = ?, mo_ta = ? WHERE product_id = ?";
        $this->setSQL($sql);
        return $this->execute([$params]);
    }
    // Xóa
    public function delete($params)
    {
        $sql = "DELETE FROM {$this->table} WHERE product_id =?";
        $this->setSQL($sql);
        return $this->execute([$params]);
    }

}
