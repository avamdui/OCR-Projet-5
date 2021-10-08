<?php
namespace Controllers;

class Article extends Controller
{
    protected $modelName = "Article";

    public function blog()
    {
        /**
         * 1. Récupération des articles
         */
        $articles = $this->model->findAll('created_at DESC');

        /**
         * 2. Affichage
         */
        $pageTitle = "Blog";
        \Renderer::render("articles/blog", compact('articles', 'pageTitle'));
    }

    public function show()
    {
        $commentModel = new \Models\Comment();
          /**
         * 1. Récupération du param "id" et vérification de celui-ci
         */
        // On part du principe qu'on ne possède pas de param "id"
        $article_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
     
        /**
         * 3. Récupération de l'article en question
         */
        $article = $this->model->find($article_id);

        /**
         * 4. Récupération des commentaires de l'article en question
         */
        $commentaires = $commentModel->findAllWithArticle($article_id);
        // $author = $commentModel->findAuthor($article_id);
        // $usersname = $commentModel->findwithusers($author[]);

        /**
         * 5. On affiche 
         */
        $pageTitle = $article['title'];

        \Renderer::render("articles/show", compact('pageTitle', 'article', 'commentaires', 'article_id'));
    }

    public function delete()
    {
        /**
         * 1. On vérifie que le GET possède bien un paramètre "id" (delete.php?id=202) et que c'est bien un nombre
         */
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        /**
         * 3. Vérification que l'article existe bel et bien
         */
        $article = $this->model->find($id);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        /**
         * 4. Réelle suppression de l'article
         */
        $this->model->delete($id);

        /**
         * 5. Redirection vers la page d'accueil
         */
        \Http::redirect("index.php");
    }
}