<?php
namespace User\Model;

use Core\Model\MainModel;

class UserModel extends MainModel
{
    const TABLENAME = "customers";

    public function getAll($orderByNewest = false)
    {
        $query = "SELECT * FROM `" . self::TABLENAME . "`";

        if($orderByNewest)
            $query .= ' ORDER BY id DESC';

        return $this->dbSelectRows($query, MYSQLI_ASSOC);
    }

    public function getByEmail($email)
    {
        $email = $this->dbSanitize($email);

        $query = "SELECT * FROM `" . self::TABLENAME . "` WHERE `email` = '{$email}'";

        return $this->dbSelectRow($query, MYSQLI_ASSOC);
    }

    public function get($id)
    {
        $id = $this->dbSanitize($id);

        $query = "SELECT * FROM `" . self::TABLENAME . "` WHERE `id` = {$id}";

        return $this->dbSelectRow($query, MYSQLI_ASSOC);
    }

    public function create($data)
    {
        $data = $this->dbSanitize($data);

        $data['pass'] = password_hash($data['pass'], PASSWORD_BCRYPT, ['cost' => 10]);

        $query = 'INSERT INTO `'. self::TABLENAME . '` SET `nick` = "'.$data['nick'].'", `email` = "'.$data['email'].'", `password` = "'.$data['pass'].'"';

        return $this->dbInsert($query);
    }

    public function update($data)
    {
        $data = $this->dbSanitize($data);

        $query = 'UPDATE `'. self::TABLENAME . '` SET `nick` = "'.$data['nick'].'", `email` = "'.$data['email'].'" WHERE `id` = "'.$data['id'].'"';

        return $this->dbUpdate($query);
    }

    public function destroy($id)
    {
        $id = $this->dbSanitize($id);

        $query = 'DELETE FROM `'. self::TABLENAME . '` WHERE `id` = "'.$id.'"';

        return $this->dbDelete($query);
    }

    public function login($login, $pass)
    {
        $login = $this->dbSanitize($login);
        $pass = $this->dbSanitize($pass);

        $query = "SELECT `id`, `nick`, `password`, `account_balance` FROM `".self::TABLENAME."` WHERE `email` = '{$login}'";
        $user = $this->dbSelectRow($query);

        if(!$user)
            return false;

        if(!password_verify($pass, $user['password']))
            return false;

        unset($user['password']);

        return $user;
    }

    public function getUserMovies($customerId)
    {
        $query = "SELECT mc.*, m.title, m.thumbnail, m.description FROM movies_customers AS mc LEFT JOIN movies as m ON m.id = mc.movie_id WHERE mc.customer_id = '".$customerId."'";

        return $this->dbSelectRows($query, MYSQLI_ASSOC);
    }

    public function getUserMoviesSum($customerId)
    {
        $query = "SELECT sum(m.price) as `sum` FROM movies_customers AS mc LEFT JOIN movies as m ON m.id = mc.movie_id WHERE mc.customer_id = '{$customerId}'";

        return $this->dbSelectRow($query);
    }
}