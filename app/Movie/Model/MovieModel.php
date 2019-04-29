<?php

namespace Movie\Model;


class MovieModel extends \Core\Model\MainModel
{
    const TABLENAME = "movies";

    public function getAll($orderByNewest = false, $onlyActive = false)
    {
        $query = "SELECT movies.*, cat.name AS category_name FROM `" . self::TABLENAME . "` LEFT JOIN `categories` AS cat ON movies.category_id = cat.id";

        if($onlyActive)
            $query .= ' WHERE movies.active = 1';

        if($orderByNewest)
            $query .= ' ORDER BY movies.id DESC';

        return $this->dbSelectRows($query, MYSQLI_ASSOC);
    }

    public function get($id)
    {
        $id = $this->dbSanitize($id);

        $query = "SELECT * FROM `" . self::TABLENAME . "` WHERE `id` = {$id}";

        return $this->dbSelectRow($query, MYSQLI_ASSOC);
    }

    public function getNewest()
    {
        $query = "SELECT movies.*, cat.name AS category_name FROM `" . self::TABLENAME . "` LEFT JOIN `categories` AS cat ON movies.category_id = cat.id ORDER BY `id` DESC LIMIT 4";

        return $this->dbSelectRows($query, MYSQLI_ASSOC);
    }

    public function search($q)
    {
        $q = $this->dbSanitize($q);

        $query = "SELECT movies.*, cat.name AS category_name FROM `" . self::TABLENAME . "` LEFT JOIN `categories` AS cat ON movies.category_id = cat.id WHERE movies.title LIKE '%{$q}%' OR movies.description LIKE '%{$q}%'";

        return $this->dbSelectRows($query, MYSQLI_ASSOC);
    }

    public function create($data)
    {
        $data = $this->dbSanitize($data);

        $query = 'INSERT INTO `movies` SET `title` = "'.$data['title'].'", `description` = "'.$data['description'].'", `thumbnail` = "'.$data['thumbnail'].'", `price` = "'.$data['price'].'", `category_id` = 1, `active` = "'.$data['active'].'", `trailer` = "'.$data['trailer'].'"';

        return $this->dbInsert($query);
    }

    public function update($data)
    {
        $data = $this->dbSanitize($data);

        $query = 'UPDATE `movies` SET `title` = "'.$data['title'].'", `description` = "'.$data['description'].'", `thumbnail` = "'.$data['thumbnail'].'", `price` = "'.$data['price'].'", `category_id` = 1, `active` = "'.$data['active'].'", `trailer` = "'.$data['trailer'].'" WHERE `id` = "'.$data['id'].'"';

        return $this->dbUpdate($query);
    }

    public function destroy($id)
    {
        $data = $this->dbSanitize($id);

        $query = 'DELETE FROM `movies` WHERE `id` = "'.$id.'"';

        return $this->dbDelete($query);
    }
}