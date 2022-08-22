<?php if ($result) : ?>
    <div class="alert alert-success">
        La catégorie a bien été modifier
    </div>
<?php endif ?>
<form method="post">
    <?= $form->input('titre', 'Titre de la catégorie'); ?>
    <button class="btn btn-primary">Save</button>
</form>