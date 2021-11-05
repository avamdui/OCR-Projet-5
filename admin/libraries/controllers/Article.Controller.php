<?php
namespace Controllers;
use ArticleService;
use ArticleViewModel;
class Article extends Controller
{
    protected $modelName = "Article";
    public function showOneArticle() 
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $article = (new ArticleService())->getOneArticle($id);
        // $comments = (new BlogService())->getCommentsForUser($id);

        $avm = new ArticleViewModel();
        $avm->article = $article;
        // $avm->comments = $comments;
        $pageTitle = "Blog";
        \Renderer::render('articles/show',compact('avm', 'pageTitle'));
    }
}

