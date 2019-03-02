<?php
namespace Auth\Model;

use Tools\Debug;

class AuthModel extends \Core\Model\MainModel
{
    public function login($email, $pass)
    {
        $email = $this->dbSanitize($email);

        $query = "SELECT * FROM admins WHERE email = '{$email}'";

        $user = $this->dbSelectRow($query);

        if(!$user)
            return false;

        if(password_verify($pass, $user['password']))
            return $user;
        else
            return false;
    }
}