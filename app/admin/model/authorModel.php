<?php 
namespace App\admin\Model;
use App\admin\model\Model;
class AuthorModel extends Model{
    protected $table = 'authors';
    public function __construct(){
        parent::__construct();
    }

    public function getAllAuthor(){
        $sql = "SELECT * FROM {$this->table}";
        $this->setSQL($sql);
        return $this->all();
    }

    public function getAuthorById($params){
        $this -> setSQL("SELECT * FROM {$this->table} WHERE author_id = ?");
        return $this->first([$params]);
    }

    public function AddAuthor($params){
        $this->setSQL("INSERT INTO {$this->table} (author_name, author_email, author_bio) VALUES (?, ?, ?)");
        return $this->execute($params);
    }

    public function isAuthorExist($author, $email){
        $this->setSQL("SELECT * FROM {$this->table} WHERE author_name = ? OR author_email = ?");
        return $this->all([$author, $email]);
    }
    
    public function DeleteAuthor($params){
        $this->setSQL("UPDATE {$this->table} SET status = 0 WHERE author_id = ?");
        return $this->execute([$params]);
    }

    public function RestoreAuthor($params){
        $this->setSQL("UPDATE {$this->table} SET status = 1 WHERE author_id = ?");
        return $this->execute([$params]);
    }
}
?>