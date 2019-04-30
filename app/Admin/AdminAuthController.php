<?php


namespace Admin;

use Core\Controller\Controller;

class AdminAuthController extends Controller
{
   public function __call($name, $arguments)
   {
       if ($arguments[1]->getPathInfo() !== '/admin/login' && !$this->checkAuth())
           $this->redirectTo('admin/login');


       if(method_exists($this, $name))
           call_user_func_array([$this, $name], $arguments);
   }

    public function checkAuth()
    {
        if(empty($_SESSION['admin']['user']))
            return false;

        return true;
    }

    private function login()
    {
        if($this->isPost()){
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING);

            $auth = new AdminAuthModel();

            if($user = $auth->login($email, $pass))
            {
                $_SESSION['admin']['user'] = $user;
                $_SESSION['admin']['loginTime'] = date("Y-m-d H:i:s");

                $this->redirectTo('admin/dashboard');
            }
            else{
                $this->render('admin/login/index.php', ['error' => 'Podano błędne dane !']);
            }

        }
        else
            $this->render('admin/login/index.php');
    }

    public function logout()
    {
        unset($_SESSION['admin']);
        $this->redirectTo('admin/login');
    }

    public function render($name, $params = [])
    {
        parent::render($name, $params);

        \Notifications::clearAll();
    }
}