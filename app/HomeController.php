<?php

use Core\Controller\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $movie = new \Movie\Model\MovieModel();
        $movies = $movie->getAll();

        \Tools\Debug::dump($movies);

        $this->render('index.php', ['movies' => $movies]);
    }
}