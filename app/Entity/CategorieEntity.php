<?php

namespace App\Entity;

class CategorieEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=articles.categorie&id=' . $this->id;
    }
}
