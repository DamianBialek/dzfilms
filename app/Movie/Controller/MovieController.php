<?php
namespace Movie\Controller;
 
 
use Movie\Model\MovieModel;
use Tools\Debug;
 
class MovieController extends \FrontController
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

    public function rent($params)
    {
        $user = $this->isAuth();
        $model = new MovieModel();
        $movie = $model->get($params['id']);

        if($movie['available'] == '0')
            $this->redirectTo('/');

        if(floatval($user['account_balance']) < floatval($movie['price'])) {
            \Notifications::add('Nie posiadasz wystarczającej ilości środków na koncie aby wypożyczyć ten film !', 'error', 'customer');
            $this->redirectTo('/');
        }

        $movie['available'] = 0;
        $user['account_balance'] = floatval($user['account_balance']) - floatval($movie['price']);

        $model->rentAMovie($movie, $user);

        \Notifications::add('Wypożyczyłeś nowy film', 'success', 'customer');
        $this->redirectTo('/myaccount');
    }
}