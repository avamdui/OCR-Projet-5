<?php

namespace Controllers;

 class Article extends Controller
 {
    protected $modelName = \Models\Article::class;
     
     public function blog()
     {

        $articles = $this->model->findAll("Created_at DESC");
        
        // affichage
        $pageTitle = "blog";
        \Renderer::render('articles/blog', compact('pageTitle', 'articles'));
        

     }
    


     public function show() 
     {

        $commentModel= new \Models\Comment();
        $article_id = null;
        
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        }

        if (!$article_id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }
        
        $article = $this->model->find($article_id);
        $commentaires = $commentModel->findAllWithArticle($article_id);
        

        $pageTitle = $article['title'];
        \Renderer::render('articles/show', compact('pageTitle', 'article', 'commentaires', 'article_id')
        ); // permet de créer un tableau associatif a partir du nom des vraiables que je veut mettre dedans , pageTile => $ pageTitle

     }

     public function delete() 
     {


        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];

        $article = $this->model->find($id);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        $this->model->delete($id);

        \Http::redirect('index.php');


     }

 }