<?php
namespace User\Model;

use Core\Model\MainModel;

class UserModel extends MainModel
{
    const TABLENAME = "customers";

    public function login($login, $pass)
    {
        $login = $this->dbSanitize($login);
        $pass = $this->dbSanitize($pass);

        $query = "SELECT `id`, `nick`, `password` FROM `".self::TABLENAME."` WHERE `email` = '{$login}'";
        $user = $this->dbSelectRow($query);

        if(!$user)
            return false;

        if(!password_verify($pass, $user['password']))
            return false;

        unset($user['password']);

        return $user;
    }
}