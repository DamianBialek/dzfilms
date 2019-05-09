<?php

namespace Movie\Model;


class MovieModel extends \Core\Model\MainModel
{
    protected $tablename = 'movies';

    public function getAll($orderByNewest = false, $onlyActive = false)
    {
        $query = "SELECT movies.*, cat.name AS category_name FROM `" . $this->tablename . "` LEFT JOIN `categories` AS cat ON movies.category_id = cat.id";

        if($onlyActive)
            $query .= ' WHERE movies.active = 1';

        if($orderByNewest)
            $query .= ' ORDER BY movies.id DESC';

        return $this->dbSelectRows($query, MYSQLI_ASSOC);
    }

    public function get($id)
    {
        $id = $this->dbSanitize($id);

        $query = "SELECT * FROM `" . $this->tablename . "` WHERE `id` = {$id}";

        return $this->dbSelectRow($query, MYSQLI_ASSOC);
    }

    public function getNewest()
    {
        $query = "SELECT movies.*, cat.name AS category_name FROM `" . $this->tablename . "` LEFT JOIN `categories` AS cat ON movies.category_id = cat.id ORDER BY `id` DESC LIMIT 4";

        return $this->dbSelectRows($query, MYSQLI_ASSOC);
    }

    public function search($q)
    {
        $q = $this->dbSanitize($q);

        $query = "SELECT movies.*, cat.name AS category_name FROM `" . $this->tablename . "` LEFT JOIN `categories` AS cat ON movies.category_id = cat.id WHERE movies.title LIKE '%{$q}%'";

        return $this->dbSelectRows($query, MYSQLI_ASSOC);
    }

    public function create($data)
    {
        $data = $this->dbSanitize($data);

        $query = 'INSERT INTO `'.$this->tablename.'` SET `title` = "'.$data['title'].'", `description` = "'.$data['description'].'", `thumbnail` = "'.$data['thumbnail'].'", `price` = "'.$data['price'].'", `category_id` = 1, `active` = "'.$data['active'].'", `trailer` = "'.$data['trailer'].'"';

        return $this->dbInsert($query);
    }

    public function update($data)
    {
        $data = $this->dbSanitize($data);

        $query = 'UPDATE `'.$this->tablename.'` SET `title` = "'.$data['title'].'", `description` = "'.$data['description'].'", `thumbnail` = "'.$data['thumbnail'].'", `price` = "'.$data['price'].'", `category_id` = 1, `active` = "'.$data['active'].'", `trailer` = "'.$data['trailer'].'" WHERE `id` = "'.$data['id'].'"';

        return $this->dbUpdate($query);
    }

    public function destroy($id)
    {
        $id = $this->dbSanitize($id);

        $query = 'DELETE FROM `'.$this->tablename.'` WHERE `id` = "'.$id.'"';

        return $this->dbDelete($query);
    }

    public function rentAMovie($movie, $customer)
    {
        $movie = $this->dbSanitize($movie);
        $customer = $this->dbSanitize($customer);

        $query = 'UPDATE `'.$this->tablename.'` SET `available` = 0 WHERE `id` = "'.$movie['id'].'"';
        $this->dbUpdate($query);

        $query = 'UPDATE `customers` SET `account_balance` = "'.$customer['account_balance'].'" WHERE `id` = "'.$customer['id'].'"';
        $this->dbUpdate($query);

        $query = 'INSERT INTO `movies_customers` SET `movie_id` = "'.$movie['id'].'", `customer_id` = "'.$customer['id'].'"';
        return $this->dbInsert($query);
    }

    public function giveAMovie($movie, $customer)
    {
        $movie = $this->dbSanitize($movie);
        $customer = $this->dbSanitize($customer);

        $query = 'UPDATE `'.$this->tablename.'` SET `available` = 1 WHERE `id` = "'.$movie['id'].'"';
        $this->dbUpdate($query);

        $query = 'UPDATE `customers` SET `account_balance` = "'.$customer['account_balance'].'" WHERE `id` = "'.$customer['id'].'"';
        $this->dbUpdate($query);

        $query = 'UPDATE `movies_customers` SET `comm_date` = CURRENT_TIMESTAMP WHERE `movie_id` = "'.$movie['id'].'" AND `customer_id` = "'.$customer['id'].'"';
        $this->dbUpdate($query);
    }

    public function getSoon()
    {
        $query = "SELECT movies.*, cat.name AS category_name FROM `" . $this->tablename . "` LEFT JOIN `categories` AS cat ON movies.category_id = cat.id";

        $query .= ' WHERE movies.active = 0';

        $query .= ' ORDER BY movies.id DESC';

        return $this->dbSelectRows($query, MYSQLI_ASSOC);
    }
}