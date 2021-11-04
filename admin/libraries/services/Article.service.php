<?php
class ArticleService {
    public function getOneArticle($id) 
    
    {
        $articleEntity = (new ArticleRepository())->getOneArticle($id);
        $article = new Article();
        $article->id = $articleEntity->id;
        $article->title = $articleEntity->title;
        $article->chapo = $articleEntity->chapo;
        $article->content = $articleEntity->content;
        $article->created_at = $articleEntity->created_at;
        $article->posted = $articleEntity->posted;

    }
}