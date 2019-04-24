<?php


namespace Admin\Movie\Controller;

use Admin\AdminAuthController;
use Movie\Model\MovieModel;

class MovieController extends AdminAuthController
{
    protected function index()
    {
        $model = new MovieModel();
        $movies = $model->getAll();

        $this->render('admin/movie/index.php', ['movies' => $movies]);
    }

    protected function create()
    {
        $this->render('admin/movie/add.php');
    }

    protected function store($params)
    {
        $model = new \Movie\Model\MovieModel();
        $model->create($params['POST']);

        \Notifications::add('Pomyślnie dodano nowy film !', 'success', 'admin');

        $this->redirectTo('admin/movies');
    }
}