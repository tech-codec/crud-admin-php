<?php

namespace App\Controller;

use \App;

class AppController extends Controller
{
    protected $template = 'default';

    public function __construct()
    {
        $this->path = ROOT . '/app/Views/';
    }

    public function loadModel($nomTable)
    {
        $this->$nomTable = App::getInstance()->getTable($nomTable);
    }

    public function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }

    public function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }
}
