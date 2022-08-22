<?php

use App\Auth\DBAuth;
use App\Html\Bootstrapform;

$result = false;
$postTable = App::getInstance()->getTable('article');
if (!empty($_POST)) {
    $result = $postTable->delete($_POST['id']);
    if ($result) {
        header('Location: admin.php');
    }
}
