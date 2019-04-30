<?php


class FrontController extends \Core\Controller\Controller
{
    public function isAuth()
    {
        if(empty($_SESSION['user']))
            $this->redirectTo('/login');
        else
            return $_SESSION['user'];
    }

    public function render($name, $params = [])
    {
        parent::render($name, $params);

        \Notifications::clearAll();
    }
}