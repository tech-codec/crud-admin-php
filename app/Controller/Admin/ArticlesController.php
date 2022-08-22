<?php

namespace App\Controller\Admin;

use App\Html\Bootstrapform;

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
        $posts = $this->Article->all();
        $this->render('admin.articles.index', compact('posts'));
    }

    public function edit()
    {
        $result = false;
        if (!empty($_POST)) {
            $result = $this->Article->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'categorie_id' => $_POST['categorie_id']
            ]);
        }

        if ($result) {
            return $this->index();
        }

        $post = $this->Article->findById($_GET['id']);
        $categories = $this->Categorie->extrat('id', 'titre');


        $form = new Bootstrapform($post);
        $this->render('admin.articles.edit', compact('post', 'categories', 'result', 'form'));
    }

    public function add()
    {
        $result = false;
        if (!empty($_POST)) {
            $result = $this->Article->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'categorie_id' => $_POST['categorie_id']
            ]);
            if ($result) {
                return $this->index();
            }
        }

        $categories = $this->Categorie->extrat('id', 'titre');


        $form = new Bootstrapform($_POST);
        $this->render('admin.articles.add', compact('categories', 'result', 'form'));
    }

    public function delete()
    {
        $result = false;
        if (!empty($_POST)) {
            $result = $this->Article->delete($_POST['id']);
            if ($result) {
                return $this->index();
            }
        }
    }
}
