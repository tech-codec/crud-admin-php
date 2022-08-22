<?php

namespace App\Controller;

use \App;

class ArticlesController extends AppController
{


    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Article');
        $this->loadModel('Categorie');
    }

    public function index()
    {
        $posts = $this->Article->last();
        $categories = $this->Categorie->all();
        $this->render('articles.index', compact('posts', 'categories'));
    }

    public function categorie()
    {
        $categorie = $this->Categorie->findById($_GET['id']);

        if ($categorie === false) {
            $this->notFound();
        }

        $articles = $this->Article->lastByCategorie($_GET['id']);
        $categories = $this->Categorie->all();
        $this->render('articles.categorie', compact('categories', 'articles', 'categorie'));
    }

    public function show()
    {
        $article = $this->Article->findById($_GET['id']);
        $this->render('articles.show', compact('article'));
    }
}
