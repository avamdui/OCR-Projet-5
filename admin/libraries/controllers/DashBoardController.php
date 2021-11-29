<?php
require_once('libraries/services/BlogService.php');
require_once('libraries/services/ModificationService.php');
require_once('libraries/services/DashBoardService.php');
require_once('libraries/models/view/Article.view.php');
require_once('libraries/models/view/DashboardArticles.view.php');
require_once('libraries/models/view/DashboardComments.view.php');
require_once('libraries/models/view/Articles.view.php');
require_once('libraries/Http.php');
require_once('libraries/renderer.php');

class DashBoardController
 {

   public function welcomArticles()
   {
      
      $DashboardArticles = new DashBoardService;
   
      $dvm = new DashBoardArticlesViewModel();
      $dvm->articles =$DashboardArticles->getallArticle();
      $dvm->countCommentsUnpublied = $DashboardArticles->countCommentsUnpublied();
      $dvm->countArticlesUnpublied = $DashboardArticles->countArticlesUnpost();
      $dvm->dashboard_content = 'templates/home/dashboard-publi.html.php';
      \Renderer::render('home/index', compact('dvm'));
      
   }
   public function changeArticleStatus()
   {
      $ArticleModel = new DashBoardArticlesModel();
      $ArticleModel->setPosted($_POST['etat']); 
      $ArticleModel->setId($_POST['id']); 
      

      $Service = new DashBoardService();
     return  $Service->changeArticleStatus($ArticleModel);
      
      \Http::redirect("index.php");

  }

  public function welcomComments()
  {
     
     $DashboardComment = new DashBoardService;
  
     $dvm = new DashBoardCommentsViewModel();
     $dvm->Comments = $DashboardComment->getAllComments();
     $dvm->countCommentsUnpublied = $DashboardComment->countCommentsUnpublied();
     $dvm->countArticlesUnpublied = $DashboardComment->countArticlesUnpost();
     $dvm->dashboard_content = 'templates/home/dashboard-comments.html.php';
     \Renderer::render('home/index', compact('dvm'));
     
  }
  public function changeCommentsStatus()
  {
     $CommentModel = new DashBoardCommentsModel();
     $CommentModel->setPublied($_POST['etat']); 
     $CommentModel->setId($_POST['id']); 
     

     $Service = new DashBoardService();
    return  $Service->changeCommentsStatus($CommentModel);
     
     \Http::redirect("index.php");

 }
 
}
