<?php

use App\Auth\DBAuth;
use App\Html\Bootstrapform;

$result = false;
$postTable = App::getInstance()->getTable('article');
if (!empty($_POST)) {
    $result = $postTable->create([
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu'],
        'categorie_id' => $_POST['categorie_id']
    ]);
    if ($result) {
        header('Location: admin.php?p=posts.edit&id=' . App::getInstance()->getDb()->lastInsertId());
    }
}

$categories = App::getInstance()->getTable('categorie')->extrat('id', 'titre');


$form = new Bootstrapform($_POST);
?>

<?php if ($result) : ?>
    <div class="alert alert-success">
        L'article a bien été ajouter
    </div>
<?php endif ?>
<form method="post">
    <?= $form->input('titre', 'Titre de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('categorie_id', 'Contegorie', $categories); ?>
    <button class="btn btn-primary">Save</button>
</form>