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