<?php
namespace User\Controller;

use Core\Controller\Controller;
use User\Model\UserModel;

class UserController extends Controller
{
    public function login()
    {
        $this->render('login/index.php');
    }

    public function signIn($params)
    {
        $model = new UserModel();
        $user = $model->login($params['POST']['email'], $params['POST']['pass']);

        if(!$user) {
            $this->render('login/index.php', ['error' => "Podano błędne dane !"]);
            exit();
        }

        $_SESSION['user'] = $user;

        header("Location: /dzfilms/");
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header("Location: /dzfilms/");
    }
}