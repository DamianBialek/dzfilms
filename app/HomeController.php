<?php

use Core\Controller\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->render('index.php');
    }
}