<?php

namespace App\Controller;

use App;
use App\Auth\DBAuth;
use App\Html\Bootstrapform;

class UsersController extends AppController
{
    public function login()
    {
        $acces = '';
        if (!empty($_POST)) {
            $auth = new DBAuth(App::getInstance()->getDb());
            if ($auth->login($_POST['username'], $_POST['password'])) {
                header('Location:index.php?p=admin.articles.index');
            } else {
                $acces = "Identifiants incorrect";
            }
        }

        $form = new Bootstrapform($_POST);
        $this->render('users.login', compact('acces', 'form'));
    }
}
