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

        $this->redirectTo('/');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        $this->redirectTo('/');
    }

    public function myAccount()
    {
        $this->isAuth();
        $user = new UserModel();
        $userMovies = $user->getUserMovies($_SESSION['user']['id']);
        $this->render("user/index.php", ['movies' => $userMovies]);
    }

    public function isAuth()
    {
        if(empty($_SESSION['user']))
            $this->redirectTo('/login');
        else
            return true;
    }
}