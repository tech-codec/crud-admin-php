<h1>Administrer les categories</h1>

<p>
    <a href="?p=admin.categories.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $categorie) : ?>
            <tr>
                <td><?= $categorie->id ?></td>
                <td><?= $categorie->titre ?></td>
                <td>
                    <a href="?p=admin.categories.edit&id=<?= $categorie->id; ?>" class="btn btn-primary">Editer</a>
                </td>
                <td>
                    <form action="?p=admin.categories.delete" method="POST">
                        <input hidden name="id" value="<?= $categorie->id ?>">
                        <Button type="submit" class="btn btn-danger">Delete</Button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>