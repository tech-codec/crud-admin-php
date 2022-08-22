<?php

use App\Table\Categorie;

$app = App::getInstance();

$post = $app->getTable('article')->findById($_GET['id']);
if ($post == false) {
    $app->notFound();
}
$app->title = $post->titre;

?>


<h1><?= $post->titre; ?></h1>

<p><?= $post->categorie; ?></p>

<p><?= $post->contenu ?></p>