<?php
namespace Controllers;

use Models\Article;
use Models\Comment;

class Index extends Controller
 {
   protected $modelName = "index";
   public function welcom()
   {
      $CommentsModel = new Comment;
      $countCommentsUnpublied= $CommentsModel->countCommentsUnpublied();
      
      $ArticlesModel = new Article;
      $countArticlesUnpublied= $ArticlesModel->countArticlesUnpost();
      $articles = $ArticlesModel->findAll('ID ASC');

      $dashboard_content = 'templates/home/dashboard-publi.html.php';
      $pageTitle = "Accueil";

      \Renderer::render('home/index', compact('pageTitle', 'dashboard_content', 'countCommentsUnpublied', 'countArticlesUnpublied','articles'));
      
   }

   public function welcom_comments()
   {
      $CommentsModel = new Comment;
      $countCommentsUnpublied= $CommentsModel->countCommentsUnpublied();
      $comments = $CommentsModel->findAllWithAllArticle();

      $ArticlesModel = new Article;
      $countArticlesUnpublied= $ArticlesModel->countArticlesUnpost();
      $articles = $ArticlesModel->findAll('ID ASC');

      $dashboard_content = 'templates/home/dashboard-comments.html.php';
      $pageTitle = "Accueil";

      \Renderer::render('home/index', compact('pageTitle','comments', 'dashboard_content', 'countCommentsUnpublied', 'countArticlesUnpublied','articles'));
      
   }
    
}