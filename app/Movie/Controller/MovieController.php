<?php
namespace Movie\Controller;


use Movie\Model\MovieModel;
use Tools\Debug;

class MovieController extends \Core\Controller\Controller
{
    public function index()
    {
        if(!filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT))
            exit();

        $movie = new MovieModel();
        $movie = $movie->get($_GET['id']);

        Debug::dump($movie);
    }
}