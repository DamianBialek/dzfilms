<?php


namespace Admin;


use Core\Model\MainModel;

class AdminAuthModel extends MainModel
{
    const TABLENAME = "admins";

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