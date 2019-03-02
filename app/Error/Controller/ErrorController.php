<?php
namespace Error\Controller;

class ErrorController extends \Core\Controller\Controller
{
    public function index()
    {

    }

    public function displayException($e)
    {
        if($this->isAjax()){
            echo json_encode(['success' => false, 'message' => "Wystąpił błąd aplikacji !!!"]);
            exit();
        }

        $this->render('error', ['error' => $e]);
    }
}