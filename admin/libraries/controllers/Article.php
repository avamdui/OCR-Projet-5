<?php
namespace Controllers;

use ArticleService;
use ArticleViewModel;

class Article extends Controller
{
    protected $modelName = "Article";
    public function showOneArticle() 
    {
        $id = $_GET['id'];
        $article = (new ArticleService())->getOneArticle($id);
        // $comments = (new BlogService())->getCommentsForUser($id);

        $avm = new ArticleViewModel();
        $avm->article = $article;
        // $avm->comments = $comments;

        \Renderer::render('articles/show', 'avm');
    }
}


