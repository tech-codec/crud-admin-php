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