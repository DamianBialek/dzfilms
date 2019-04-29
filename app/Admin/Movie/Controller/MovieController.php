<?php


namespace Admin\Movie\Controller;

use Admin\AdminAuthController;
use Movie\Model\MovieModel;
use Tools\Debug;

class MovieController extends AdminAuthController
{
    protected function index()
    {
        $model = new MovieModel();
        $movies = $model->getAll(true);

        $this->render('admin/movie/index.php', ['movies' => $movies]);
    }

    protected function create()
    {
        $this->render('admin/movie/add.php');
    }

    protected function store($params)
    {
        $model = new MovieModel();
        $model->create($params['POST']);

        \Notifications::add('Pomyślnie dodano nowy film !', 'success', 'admin');

        $this->redirectTo('admin/movies');
    }

    protected function show($params)
    {
        $model = new MovieModel();
        $movie = $model->get($params['id']);

        $this->render('admin/movie/edit.php', ['movie' => $movie]);
    }

    protected function update($params)
    {
        $model = new MovieModel();
        $result = $model->update($params['POST']);

        \Notifications::add('Pomyślnie edytowano film !', 'success', 'admin');

        $this->redirectTo('admin/movies');
    }

    protected function destroy($params)
    {
        $model = new MovieModel();
        $movie = $model->get($params['id']);

        if($movie)
            $model->destroy($params['id']);

        \Notifications::add('Pomyślnie usunięto film !', 'success', 'admin');

        $this->redirectTo('admin/movies');
    }
}