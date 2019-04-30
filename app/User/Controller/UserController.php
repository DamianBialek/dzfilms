<?php
namespace User\Controller;

use User\Model\UserModel;

class UserController extends \FrontController
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
        $user = $this->isAuth();
        $userModel = new UserModel();
        $userMovies = $userModel->getUserMovies($user['id']);
        $sum = $userModel->getUserMoviesSum($user['id'])[0];
        $user = $userModel->get($user['id']);
        $this->render("user/index.php", ['movies' => $userMovies, 'user' => $user, 'sum' => $sum]);
    }
}