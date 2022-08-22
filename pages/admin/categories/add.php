<?php

use App\Auth\DBAuth;
use App\Html\Bootstrapform;

$result = false;
$postTable = App::getInstance()->getTable('categorie');
if (!empty($_POST)) {
    $result = $postTable->create([
        'titre' => $_POST['titre'],
    ]);
    if ($result) {
        header('Location: admin.php?p=categories.index');
    }
}

$form = new Bootstrapform($_POST);
?>

<?php if ($result) : ?>
    <div class="alert alert-success">
        La catégorie a bien été ajouter
    </div>
<?php endif ?>
<form method="post">
    <?= $form->input('titre', 'Titre de la catégorie'); ?>
    <button class="btn btn-primary">Save</button>
</form>