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
      $Comments = $CommentsModel->findAll('created_at DESC');
      $ArticlesModel = new Article;
      $countArticlesUnpublied= $ArticlesModel->countArticlesUnpost();
      // $articles = $ArticlesModel->findAll('created_at DESC');

      $errorMessage = "";
      $succesMessage = ''; 
      $pageTitle = "Accueil";
      \Renderer::render('home/index', compact('pageTitle', 'succesMessage','Comments','errorMessage', 'countCommentsUnpublied', 'countArticlesUnpublied'));

   }
  
 
 public function succes()
 
 {
   session_start();
    $errorMessage = "";
    $succesMessage =  "Merci ". $_SESSION['name'] ." votre message à bien été envoyé";
    $pageTitle = "Accueil";
    \Renderer::render('home/index', compact('pageTitle', 'succesMessage', 'errorMessage'));

 }
 
public function errorMAil()
 {  
    
    $succesMessage =  '';
    $errorMessage =  "Votre adresse email n'est pas conforme";
    $pageTitle = "Accueil";
    \Renderer::render('home/index', compact('pageTitle','succesMessage', 'errorMessage'));

 }
}