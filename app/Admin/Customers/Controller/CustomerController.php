<?php


namespace Admin\Customers\Controller;


use Admin\AdminAuthController;
use Tools\Debug;
use User\Model\UserModel;

class CustomerController extends AdminAuthController
{
    protected function index()
    {
        $model = new UserModel();
        $customers = $model->getAll(true);

        $this->render('admin/customer/index.php', ['customers' => $customers]);
    }

    protected function create()
    {
        $this->render('admin/customer/add.php');
    }

    protected function store($params)
    {
        try {
            if(empty($params['POST']['pass']) || empty($params['POST']['confirm-password']))
                throw new \Exception("Podaj hasło !");

            if($params['POST']['pass'] !== $params['POST']['confirm-password'])
                throw new \Exception("Podane hasła są różne !");

            $model = new UserModel();

            if($model->getByEmail($params['POST']['email']))
                throw new \Exception("Istnieje już klient o takim adresie e-mail !");

            $model->create($params['POST']);

            \Notifications::add('Pomyślnie dodano nowego klienta !', 'success', 'admin');

            $this->redirectTo('admin/customers');

        } catch (\Exception $e) {
            $this->render('admin/customer/add.php', ['error' => $e->getMessage(), 'data' => $params['POST']]);
        }
    }

    protected function show($params)
    {
        $model = new UserModel();
        $customer = $model->get($params['id']);

        $this->render('admin/customer/edit.php', ['customer' => $customer]);
    }

    protected function update($params)
    {
        $model = new UserModel();
        $result = $model->update($params['POST']);

        \Notifications::add('Pomyślnie edytowano klienta !', 'success', 'admin');

        $this->redirectTo('admin/customers');
    }

    protected function destroy($params)
    {
        $model = new UserModel();
        $movie = $model->get($params['id']);

        if($movie)
            $model->destroy($params['id']);

        \Notifications::add('Pomyślnie usunięto klienta !', 'success', 'admin');

        $this->redirectTo('admin/customers');
    }
}