<?php

namespace App\Controller\Admin;

use App\Html\Bootstrapform;

class CategoriesController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Categorie');
    }

    public function index()
    {
        $categories = $this->Categorie->all();
        $this->render('admin.categories.index', compact('categories'));
    }

    public function edit()
    {
        $result = false;
        if (!empty($_POST)) {
            $result = $this->Categorie->update($_GET['id'], [
                'titre' => $_POST['titre'],
            ]);
        }

        if ($result) {
            return $this->index();
        }

        $categorie = $this->Categorie->findById($_GET['id']);


        $form = new Bootstrapform($categorie);
        $this->render('admin.categories.edit', compact('categorie', 'form', 'result'));
    }

    public function add()
    {
        $result = false;
        if (!empty($_POST)) {
            $result = $this->Categorie->create([
                'titre' => $_POST['titre'],
            ]);
            if ($result) {
                return $this->index();
            }
        }

        $form = new Bootstrapform($_POST);
        $this->render('admin.categories.add', compact('result', 'form'));
    }

    public function delete()
    {
        $result = false;
        if (!empty($_POST)) {
            $result = $this->Categorie->delete($_POST['id']);
            if ($result) {
                return $this->index();
            }
        }
    }
}
