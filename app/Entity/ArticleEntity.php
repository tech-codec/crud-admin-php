<?php

namespace App\Entity;

class ArticleEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=articles.show&id=' . $this->id;
    }

    public function getExtrait()
    {
        $html = '<p>' . substr($this->contenu, 0, 100) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
        return $html;
    }
}
