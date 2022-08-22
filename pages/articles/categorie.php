<?php

$app = App::getInstance();

$categorie = $app->getTable('categorie')->findById($_GET['id']);

if ($categorie === false) {
    $app->notFound();
}

$articles = $app->getTable('article')->lastByCategorie($_GET['id']);
$categories = $app->getTable('categorie')->all();
?>

<h1><?= $categorie->titre ?></h1>

<div class="row">
    <div class="col-sm-8">

        <?php foreach ($articles as $post) : ?>

            <h2><a href="<?= $post->url ?>"><?= $post->titre;  ?></a></h2>
            <p><em><?= $post->categorie; ?></em></p>
            <p><?= $post->extrait; ?></p>


        <?php endforeach; ?>
    </div>
    <div class="col-sm-4">
        <?php foreach ($categories as $categorie) : ?>
            <li><a href="<?= $categorie->url ?>"><?= $categorie->titre ?></a></li>
        <?php endforeach; ?>
    </div>
</div>