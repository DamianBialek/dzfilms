<?php
namespace Movie\Controller;


use Movie\Model\MovieModel;
use Tools\Debug;

class MovieController extends \Core\Controller\Controller
{
    public function show($params)
    {
        $movie = new MovieModel();
        $movie = $movie->get($params['id']);

        Debug::dump($movie);
    }
}