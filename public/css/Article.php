<?Php

namespace App\Table;

use App\App;
use App\Table\Table;

class Article extends Table
{

    public static function getLast()
    {
        return self::query(
            "SELECT articles.id, articles.titre, articles.contenu, 
            categories.titre as categorie 
            FROM articles   
            LEFT JOIN categories 
                ON categorie_id = categories.id
            ORDER BY articles.date DESC 
            "
        );
    }

    public static function find($id)
    {
        return self::query(
            "SELECT articles.id, articles.titre, articles.contenu, 
            categories.titre as categorie 
            FROM articles   
            LEFT JOIN categories 
                ON categorie_id = categories.id
            WHERE articles.id = ?
            ",
            [$id],
            true
        );
    }

    public function getURL()
    {
        return 'index.php?p=article&id=' . $this->id;
    }

    public static function lastByCategorie($categorie_id)
    {
        return self::query(
            "SELECT articles.id, articles.titre, articles.contenu, 
            categories.titre as categorie 
            FROM articles 
            LEFT JOIN categories 
                ON categorie_id = categories.id
            WHERE categories.id=?
            ORDER BY articles.date DESC 
            ",
            [$categorie_id],
        );
    }

    public function getExtrait()
    {
        $html = '<p>' . substr($this->contenu, 0, 50)  . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a>';
        return $html;
    }
}
