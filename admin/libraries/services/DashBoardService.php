<?php
require_once('libraries/Repositories/ArticleRepository.php');
require_once('libraries/Repositories/CommentRepository.php');
require_once('libraries/Repositories/UserRepository.php');

require_once('libraries/Models/model/DashBoardComments.Model.php');
require_once('libraries/Models/model/DashBoardArticles.Model.php');

require_once('libraries/Models/model/Article.Model.php');
require_once('libraries/Models/model/Articles.Model.php');
require_once('libraries/Models/model/User.Model.php');
require_once('libraries/Models/model/Comment.Model.php');




class DashBoardService
{
    public function getAllArticle()
    {
        $articlesRepo = new ArticleRepository();
        $articlesEntities = $articlesRepo->getAllArticles();

        $DashBoardArticlesModel = [];
        
        foreach($articlesEntities as $a)
        {
            $am = new DashBoardArticlesModel();
            $am->setId($a->getId());
            $am->setTitle($a->getTitle());
            $am->setCreatedAt($a->getCreatedAt());
            $am->setPosted($a->getPosted());
            array_push($DashBoardArticlesModel, $am);
        }
        return $DashBoardArticlesModel;

    }

    public function getAllComments()
    {
        $commentRepo = new CommentRepository();
        $userRepo = new UserRepository();
        $articleRepo = new ArticleRepository();

        $CommentEntities = $commentRepo->getAllComments();


        $DashBoardCommentModel = [];

        foreach($CommentEntities as $c)
        {
            $cm = new DashBoardCommentsModel();
            $cm->setId($c->getId());
            $cm->setContent($c->getContent());
            $cm->setCreatedAt($c->getCreatedAt());
            $cm->setPublied($c->isPublied());

            $articleEntity = $articleRepo->getOneArticle($c->getArticleID());
            $CommentsUserEntity = $userRepo->getUserById($c->getAuthorId());

            $CommentsUserModel = new UserModel();
            $CommentsUserModel->setFirstname(ucfirst(strtolower($CommentsUserEntity->getFirstname())));
            $CommentsUserModel->setLastname(strtoupper($CommentsUserEntity->getLastname()));
            

            $DashBoardArticlesModel = new DashBoardArticlesModel();
            $DashBoardArticlesModel->setTitle($articleEntity->getTitle());

            $cm->setArticle($DashBoardArticlesModel);
            $cm->setAuthor($CommentsUserModel);
            array_push($DashBoardCommentModel, $cm);
        }
        
        return $DashBoardCommentModel;
    }



    public function countArticlesUnpost()
    {
            $articlesRepo = new ArticleRepository();
            $ArticlesUnpost = $articlesRepo->countArticlesUnpost();
            return $ArticlesUnpost;
    }
    
    public function countCommentsUnpublied()
    {   
        $commentRepo = new CommentRepository();
        $CommentsUnpublied = $commentRepo->countCommentsUnpublied();
        return $CommentsUnpublied;
    }

    public function changeArticleStatus(DashBoardArticlesModel $ArticleModel){
        
        $articlesRepo = new ArticleRepository();

        $articleEntite = new ArticleEntity();
        $articleEntite->setId($ArticleModel->getId());
        $articleEntite->setPosted($ArticleModel->getPosted());

        if($articleEntite->getPosted()){
            $articleEntite->setPosted(0);
            $articlesRepo->changeStatus($articleEntite);
            \Http::redirect("index.php");
            
        }else{
            $articleEntite->setPosted(1);
            $articlesRepo->changeStatus($articleEntite);
            \Http::redirect("index.php");
            
        }
    }
    public function changeCommentsStatus(DashBoardCommentsModel $CommentModel){
        
        $Commentsrepo = new CommentRepository();

        $CommentEntity = new CommentEntity();
        $CommentEntity->setId($CommentModel->getId());
        $CommentEntity->setPublied($CommentModel->isPublied());

        if($CommentEntity->isPublied()){
            $CommentEntity->setPublied(0);
            $Commentsrepo->changeStatus($CommentEntity);
            \Http::redirect("index.php?controller=DashBoardController&task=welcomComments");
            
        }else{
            $CommentEntity->setPublied(1);
            $Commentsrepo->changeStatus($CommentEntity);
            \Http::redirect("index.php?controller=DashBoardController&task=welcomComments");
            
        }
    }

    
}
