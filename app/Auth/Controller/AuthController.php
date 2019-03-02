<?php

namespace Auth\Controller;


use Auth\Model\AuthModel;

class AuthController extends \Core\Controller\Controller
{
    public function index()
    {
        if(self::checkAuth()){
            header("Location: index.php");
            exit();
        }

        if($this->isPost()){
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING);

            $auth = new AuthModel();

            if($user = $auth->login($email, $pass))
            {
                $_SESSION['login']['user'] = $user['username'];
                $_SESSION['login']['loginTime'] = date("Y-m-d H:i:s");

                header("Location: index.php");
                exit();
            }
            else{
                $this->render('login/login', ['error' => true]);
            }

        }
        else
            $this->render('login/login');
    }

    public static function checkAuth()
    {
        if(empty($_SESSION['login']) || empty($_SESSION['login']['user']))
            return false;

        return true;
    }

    public function logout()
    {
        if(!self::checkAuth()){
            header("Location: index.php?mod=login");
            exit();
        }

        unset($_SESSION['login']);
        $this->render('login/login', ['success' => true]);
    }

//    public function createPassHash()
//    {
//        $pass = 'test';
//
//        echo password_hash($pass, PASSWORD_BCRYPT);
//    }
}