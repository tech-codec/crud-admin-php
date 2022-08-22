<?php

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'articles.index';
}



$page = explode('.', $page);
if ($page[0] === 'admin') {
    $controller = '\App\Controller\admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} else {
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}
$controller = new $controller();
$controller->$action();



/*if ($page === 'home') {
    $controller = new \App\Controller\ArticleController();
    $controller->index();
    //require ROOT . '/pages/articles/home.php';
} elseif ($page === 'articles.categorie') {
    $controller = new \App\Controller\ArticleController();
    $controller->categorie();
    //require ROOT . '/pages/articles/categorie.php';
} elseif ($page === 'articles.show') {
    $controller = new \App\Controller\ArticleController();
    $controller->show();
    //require ROOT . '/pages/articles/show.php';
} elseif ($page === 'login') {
    $controller = new \App\Controller\UserController();
    $controller->login();
    //require ROOT . '/pages/users/longin.php';
}*/
