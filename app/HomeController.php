<?php

class HomeController extends FrontController
{
    public function index()
    {
        $movie = new \Movie\Model\MovieModel();
        $movies = $movie->getAll(false, true);

        $this->render('index.php', ['movies' => $movies]);
    }
}