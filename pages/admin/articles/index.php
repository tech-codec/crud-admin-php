<?php

$posts = App::getInstance()->getTable('article')->all();
?>



<h1>Administrer les articles</h1>

<p>
    <a href="?p=posts.add" class="btn btn-success">Ajouter</a>
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
        <?php foreach ($posts as $post) : ?>
            <tr>
                <td><?= $post->id ?></td>
                <td><?= $post->titre ?></td>
                <td>
                    <a href="?p=posts.edit&id=<?= $post->id; ?>" class="btn btn-primary">Editer</a>
                </td>
                <td>
                    <form action="?p=posts.delete" method="POST">
                        <input hidden name="id" value="<?= $post->id ?>">
                        <Button type="submit" class="btn btn-danger">Delete</Button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>