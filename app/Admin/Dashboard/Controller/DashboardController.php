<?php


namespace Admin\Dashboard\Controller;


use Admin\AdminAuthController;

class DashboardController extends AdminAuthController
{
    protected function index()
    {
        $this->render('admin/dashboard/index.php');
    }
}