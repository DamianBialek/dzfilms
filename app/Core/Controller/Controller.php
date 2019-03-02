<?php

namespace Core\Controller;

abstract class Controller
{
    protected $view;

    abstract public function index();

    public function __construct()
    {
        $this->view = new \Core\View();
    }

    public function render($name, $params = [])
    {
        $params['user'] = $_SESSION['login'];

        $this->view->render($name, $params);
    }

    public function isPost()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
            return true;

        return false;
    }

    public function isAjax()
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
            return true;
        }

        return false;
    }
}