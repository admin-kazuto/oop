<?php

namespace App\admin\model; 
use App\admin\Model\Model;
class BooksModel extends Model
{
    protected $table = 'books';
    protected $stmt;
    public function __construct()
    {
        parent::__construct();
    }

    public function GetAllWithCategoryAndAuthor()
    {
        $sql = "SELECT {$this->table}.*, categories.name AS category_name, authors.name AS author_name FROM books JOIN categories ON books.category_id = categories.category_id JOIN authors ON books.author_id = authors.author_id;";
        $this->setSQL($sql);
        return $this->all();
    }

    public function GetAllBooks()
    {
        $this->setSQL("SELECT * FROM {$this->table}");
        return $this->all();
    }

    public function getBookById($params)
    {
        $this->setSQL("SELECT * FROM {$this->table} WHERE book_id = ?");
        return $this->first([$params]);
    }

    public function GetAllCategories()
    {
        $this->setSQL("SELECT * FROM categories");
        return $this->all();
    }

    public function GetAllAuthor()
    {
        $this->setSQL("SELECT * FROM authors");
        return $this->all();
    }

    public function AddBook($params)
    {
        $this->setSQL("INSERT INTO {$this->table} (title, author_id, category_id, price, quantity,description ,image) VALUES (?,?,?,?,?,?,?)");
        return $this->execute($params);
    }

    public function DeleteBook($params)
    {
        $this->setSQL("update books set status = 0 where book_id = ?");
        return $this->execute([$params]);
    }

    public function RestoreBook($params)
    {
        $this -> setSQL('UPDATE books SET status = 1 WHERE book_id = ?');
        return $this->execute([$params]);
    }
}
