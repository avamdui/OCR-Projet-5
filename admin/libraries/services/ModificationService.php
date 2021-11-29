<?php
require_once('libraries/Repositories/ArticleRepository.php');
require_once('libraries/Repositories/CommentRepository.php');
require_once('libraries/Repositories/UserRepository.php');
require_once('libraries/Models/model/Article.Model.php');
require_once('libraries/Models/model/Article.creation.php');
require_once('libraries/Models/model/Articles.Model.php');
require_once('libraries/Models/model/User.Model.php');
require_once('libraries/Models/model/Comment.Model.php');

class ModificationService
{

    public function insertArticle(ArticleCreationModel $model): int
    {

        $articleRepo = new ArticleRepository();
        $entite = new ArticleEntity();


        $entite->setTitle($model->getTitle()); 
        $entite->setChapo($model->getChapo()); 
        $entite->setContent($model->getContent());
        $entite->setPosted(1);
        $entite->setUserId($model->getAuthorId());
        return $articleRepo->insertArticle($entite);

    } 
    
    public function editArticle(ArticleModificationModel $model): int
    {

        $articleRepo = new ArticleRepository();
        $entite = new ArticleEntity();


        $entite->setTitle($model->getTitle()); 
        $entite->setChapo($model->getChapo()); 
        $entite->setContent($model->getContent());
        $entite->setId($model->getId());

        return $articleRepo->updateArticle($entite);

    } 
         
    public function getArticleWithCommentsForEdit(int $id) : ?ArticleModel
    {
        $articleRepo = new ArticleRepository();
        $commentRepo = new CommentRepository();

        $articleEntity = $articleRepo->getOneArticle($id);
        if($articleEntity === null) return null;

        $commentsEntities = $commentRepo->getCommentsByArticleId($id);

        $commentsModel = [];
        foreach($commentsEntities as $c)
        {
            $cm = new CommentModel();
            $cm->setId($c->getId());
            $cm->setArticleId($c->getArticleId());
            $cm->setAuthorId($c->getAuthorId());
            $cm->setContent($c->getContent());
            $cm->setCreatedAt($c->getCreatedAt());
            $cm->setPublied($c->getPublied());
            array_push($commentsModel, $cm);
        }

        $articleModel = new ArticleModel();
        $articleModel->setAllComments($commentsModel);
        $articleModel->setChapo($articleEntity->getChapo());
        $articleModel->setContent($articleEntity->getContent());
        $articleModel->setCreatedAt($articleEntity->getCreatedAt());
        $articleModel->setId($articleEntity->getId());
        $articleModel->setPosted($articleEntity->getPosted());
        $articleModel->setTitle($articleEntity->getTitle());        

        return $articleModel;        
    }
    
    public function deleteArticleComments($id)
    {
        $commentRepo = new CommentRepository();
        $commentRepo->deleteArticleComments($id);
    }

    public function deleteArticle($id)
    {  
        $articleRepo = new ArticleRepository();
        $articleRepo->deleteArticle($id);
        return $id;
    }
}
