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
 
        $this->render('movie/index.php', ['movie' => $movie]);
    }
    
    public function newest()
    {
        $movie = new MovieModel();
        $movies = $movie->getNewest();
 
        $this->render('newest/index.php', ['movies' => $movies]);
    }
     public function search($params)
    {
        $q = $params['GET']['q'];
 
        if(empty($q)) {
            header("Location: /dzfilms/");
            exit();
        }
 
        $movie = new MovieModel();
        $movies = $movie->search($params['GET']['q']);
 
        $this->render('search/index.php', ['q' => $q, 'movies' => $movies]);
    }
}