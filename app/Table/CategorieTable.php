<?php

namespace App\Table;


class CategorieTable extends Table
{
    protected $table = 'categories';

    public function findById($id)
    {
        return $this->query(
            "SELECT
            *FROM categories
            WHERE categories.id =?",
            [$id],
            true
        );
    }
}
