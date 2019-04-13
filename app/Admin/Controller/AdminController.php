<?php

namespace Admin\Controller;


use Tools\Debug;

class AdminController extends \Core\Controller\Controller
{
    public function index()
    {
        $this->render('admin/index.php');
    }

    public function store($params)
    {
        $model = new \Movie\Model\MovieModel();
        $model->create($params['POST']);

        $this->render('admin/index.php', ['success' => true]);
    }
}