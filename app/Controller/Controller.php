<?php

namespace App\Controller;

class Controller
{
    protected $path;
    protected $template;

    public function render($view, $models = [])
    {
        ob_start();
        extract($models);
        require($this->path . str_replace('.', '/', $view) . '.php');

        $content = ob_get_clean();

        require($this->path . 'templates/' . $this->template . '.php');
    }
}
