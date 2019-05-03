<?php


namespace Admin\Dashboard\Controller;

use Admin\AdminAuthController;
use Movie\Model\MovieModel;
use User\Model\UserModel;

class DashboardController extends AdminAuthController
{
    protected function index()
    {
        $mModel = new MovieModel();
        $numberOfMovies = $mModel->count();
        $cModel = new UserModel();
        $numberOfCustomers = $cModel->count();

        $this->render('admin/dashboard/index.php', ['numberOfMovies' => $numberOfMovies, 'numberOfCustomers' => $numberOfCustomers]);
    }
}