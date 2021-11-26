<?php
require_once('libraries/services/BlogService.php');
require_once('libraries/models/view/Article.view.php');
require_once('libraries/models/view/Articles.view.php');
require_once('libraries/Http.php');
require_once('libraries/renderer.php');

class ArticleController
{
    public function showOneArticle() 
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $article = (new BlogService())->getOneArticleWithComments($id);
        
        $avm = new ArticleViewModel();
        $avm->article = $article;
        $avm->pageTitle = $article->getTitle() . ' by ' . $article->getAuthor()->getFullname();
        $avm->commentBlock = 'templates/articles/commentblock.html.php';
        

        \Renderer::render('articles/show',compact('avm'));
    }

    public function showAllarticles() 
    {
        $articles = (new BlogService())->getallArticle();
        
        $asvm = new ArticlesViewModel();
        
        $asvm->articles = $articles;
        
        
        \Renderer::render('articles/blog',compact('asvm'));
    }

    public function showAllArticlesWithPagination()
    {
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = (int) strip_tags($_GET['page']);
        } else {
            $currentPage = 1;
        }
        $articleParPage = 5;

        $service = new BlogService();
        $articles = $service->getAllArticlesWithPagination($articleParPage, $currentPage);
        $asvm = new ArticlesViewModel();
        $asvm->articles = $articles;
        $asvm->pageTitle = 'Nos articles - page ' . $currentPage;
        $asvm->currentPage = $currentPage;
        $asvm->totalPage = $service->getNombreTotalDePages($articleParPage);


        \Renderer::render('articles/blog', compact('asvm'));
    }
    public function insertComment()
    {
        // Controller les infos
        // ViewModel avec les erreurs et avec les valeurs deja saisies

        // Enregistrement du commentaire
        $model = new CommentCreationModel();
        $model->setAuthorId($_POST['authorID']);
        $articleID = $_POST['articleId'];
        $model->setArticleID($articleID);
        $model->setContent($_POST['content']);
        $model->setPublied(0);

        $service = new BlogService();
        $service->insertComment($model);

        // Redirection vers le blog
        \Http::redirect("index.php?controller=articleController&task=showOneArticle&id=" . $articleID);   
    }

}

