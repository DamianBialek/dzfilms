<?php

use Core\Controller\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $movie = new \Movie\Model\MovieModel();
        $movies = $movie->getAll(false, true);

        $this->render('index.php', ['movies' => $movies]);
    }
}