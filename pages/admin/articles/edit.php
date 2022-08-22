<?php

use App\Auth\DBAuth;
use App\Html\Bootstrapform;

$result = false;
$postTable = App::getInstance()->getTable('article');
if (!empty($_POST)) {
    $result = $postTable->update($_GET['id'], [
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu'],
        'categorie_id' => $_POST['categorie_id']
    ]);
}

$post = $postTable->findById($_GET['id']);
$categories = App::getInstance()->getTable('categorie')->extrat('id', 'titre');


$form = new Bootstrapform($post);
?>

<?php if ($result) : ?>
    <div class="alert alert-success">
        L'article a bien été modifier
    </div>
<?php endif ?>
<form method="post">
    <?= $form->input('titre', 'Titre de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('categorie_id', 'Contegorie', $categories); ?>
    <button class="btn btn-primary">Save</button>
</form>