<?php

namespace App\Table;

class ArticleTable extends Table
{

    protected $table = "articles";
    /**
     *Récupère les dernières articles
     *
     * @return arry
     */
    public function last()
    {
        return $this->query(
            "SELECT articles.id, articles.contenu, articles.titre,categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON categorie_id = categories.id
            ORDER BY articles.date DESC"
        );
    }

    public function findById($id)
    {
        return $this->query(
            "SELECT articles.id, articles.titre, articles.contenu, articles.categorie_id, categories.titre as categorie
            FROM articles 
            LEFT JOIN categories ON categorie_id = categories.id
            WHERE articles.id =?",
            [$id],
            true
        );
    }

    public function lastByCategorie($id)
    {
        return $this->query(
            "SELECT articles.id, articles.titre, articles.contenu,articles.date, categories.titre as categorie
            FROM articles 
            LEFT JOIN categories ON categorie_id = categories.id
            WHERE articles.categorie_id =?
            ORDER BY articles.date DESC",
            [$id]
        );
    }
}
