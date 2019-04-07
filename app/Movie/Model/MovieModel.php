<?php
namespace Movie\Model;


class MovieModel extends \Core\Model\MainModel
{
    const TABLENAME = "movies";

    public function getAll()
    {
        $query = "SELECT movies.*, cat.name AS category_name FROM `".self::TABLENAME."` LEFT JOIN `categories` AS cat ON movies.category_id = cat.id";

        return  $this->dbSelectRows($query, MYSQLI_ASSOC);
    }

    public function get($id)
    {
        $id = $this->dbSanitize($id);

        $query = "SELECT * FROM `".self::TABLENAME."` WHERE `id` = {$id}";

        return $this->dbSelectRow($query, MYSQLI_ASSOC);
    }
    
    public function getNewest()
    {
        $query = "SELECT movies.*, cat.name AS category_name FROM `".self::TABLENAME."` LEFT JOIN `categories` AS cat ON movies.category_id = cat.id ORDER BY `id` DESC LIMIT 4";
 
        return  $this->dbSelectRows($query, MYSQLI_ASSOC);
    }
    public function search($q)
    {
        $q = $this->dbSanitize($q);
 
        $query = "SELECT movies.*, cat.name AS category_name FROM `".self::TABLENAME."` LEFT JOIN `categories` AS cat ON movies.category_id = cat.id WHERE movies.title LIKE '%{$q}%' OR movies.description LIKE '%{$q}%'";
 
        return $this->dbSelectRows($query, MYSQLI_ASSOC);
    }
}