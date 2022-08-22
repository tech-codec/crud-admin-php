<?php

use App\Auth\DBAuth;
use App\Html\Bootstrapform;

$result = false;
$categorieTable = App::getInstance()->getTable('categorie');
if (!empty($_POST)) {
    $result = $categorieTable->delete($_POST['id']);
    if ($result) {
        header('Location: admin.php?p=categories.index');
    }
}
