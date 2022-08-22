<?php

namespace App\Table;

use App\App;
use App\Table\Table;

class Categorie extends Table
{

    public static $table = 'categories';

    public function getURL()
    {
        return 'index.php?p=categorie&id=' . $this->id;
    }
}
