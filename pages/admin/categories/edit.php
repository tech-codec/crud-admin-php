<?php

use App\Auth\DBAuth;
use App\Html\Bootstrapform;

$result = false;
$postTable = App::getInstance()->getTable('categorie');
if (!empty($_POST)) {
    $result = $postTable->update($_GET['id'], [
        'titre' => $_POST['titre'],
    ]);
}

$categorie = $postTable->findById($_GET['id']);


$form = new Bootstrapform($categorie);
?>

<?php if ($result) : ?>
    <div class="alert alert-success">
        La catégorie a bien été modifier
    </div>
<?php endif ?>
<form method="post">
    <?= $form->input('titre', 'Titre de la catégorie'); ?>
    <button class="btn btn-primary">Save</button>
</form>