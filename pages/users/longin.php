<?php

use App\Auth\DBAuth;
use App\Html\Bootstrapform;

$acces = '';
if (!empty($_POST)) {
    $auth = new DBAuth(App::getInstance()->getDb());
    if ($auth->login($_POST['username'], $_POST['password'])) {
        header('Location:admin.php');
    } else {
        $acces = "Identifiants incorrect";
    }
}

$form = new Bootstrapform($_POST);
?>

<?php if ($acces !== '') : ?>
    <div class="alert alert-danger">
        <?= $acces; ?>
    </div>
<?php endif ?>
<form method="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>