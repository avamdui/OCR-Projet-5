<?php
require_once('libraries/Repositories/ArticleRepository.php');
require_once('libraries/Repositories/CommentRepository.php');
require_once('libraries/Repositories/UserRepository.php');
require_once('libraries/Models/model/Article.Model.php');
require_once('libraries/Models/model/ArticlesPaginationModel.php');
require_once('libraries/Models/model/CommentWithNameModel.php');
require_once('libraries/Models/model/CommentCreation.model.php');
require_once('libraries/Models/model/Articles.Model.php');
require_once('libraries/Models/model/User.Model.php');
require_once('libraries/Models/model/Comment.Model.php');

class BlogService
{
    public function getOneArticleWithComments(int $id) : ?ArticleModel
    {
        $articleRepo = new ArticleRepository();
        $commentRepo = new CommentRepository();
        $userRepo = new UserRepository();

        $articleEntity = $articleRepo->getOneArticle($id);
        if($articleEntity == null) return null;

        $commentsEntities = $commentRepo->getCommentsByArticleId($id);

        $userArticleEntity = $userRepo->getUserById($articleEntity->getUserId()); // je veut l'utilisateur qui à l'ID de l'auteur ID de l'article et non l'ID de l'article
        if($userArticleEntity == null) return null;
        
        $userModel = new UserModel();
        $userModel->setId($userArticleEntity->getId());
        $userModel->setFirstname(ucfirst(strtolower($userArticleEntity->getFirstname()) ));
        $userModel->setLastname(strtoupper($userArticleEntity->getLastname()));
        $userModel->setEmail($userArticleEntity->getEmail());
        $userModel->setFullname($userModel->getFirstname() . ' ' . $userModel->getLastname());
        $userModel->setRole($userArticleEntity->getRole());


        $commentsModel = [];
        foreach($commentsEntities as $c)
        {
            
            $cm = new CommentWithNameModel();
            $cm->setId($c->getId());
            $CommentsUserEntity = $userRepo->getUserById($c->getAuthorId());
            $userCommentModel = new UserModel();
            $userCommentModel->setId($CommentsUserEntity->getId());
            $userCommentModel->setFirstname(ucfirst(strtolower($CommentsUserEntity->getFirstname()) ));
            $userCommentModel->setLastname(strtoupper($CommentsUserEntity->getLastname()));
            $cm->setFullname($userCommentModel->getFirstname() ."  ". $userCommentModel->getLastname() );
            $cm->setArticleId($c->getArticleId());
            $cm->setContent($c->getContent());
            $cm->setCreatedAt($c->getCreatedAt());
            $cm->setPublied($c->getPublied());
            $cm->setCensored( strpos($cm->getContent(), 'http://') != false );
            
            array_push($commentsModel, $cm);

        }
    
        $articleModel = new ArticleModel();
        $articleModel->setAllComments($commentsModel);
        $articleModel->setAuthor($userModel);
        $articleModel->setChapo($articleEntity->getChapo());
        $articleModel->setContent($articleEntity->getContent());
        $articleModel->setCreatedAt($articleEntity->getCreatedAt());
        $articleModel->setId($articleEntity->getId());
        $articleModel->setPosted($articleEntity->getPosted());
        
        $interval = date_diff($articleModel->getCreatedAt(), new DateTime('now'));
        $articleModel->setRecent( $interval->format('%a') < 31 );

        $articleModel->setTitle($articleEntity->getTitle());        

        return $articleModel;        
    }

    public function getallArticle()
    {
        $articlesRepo = new ArticleRepository();
        $articlesEntities = $articlesRepo->getAllArticles();
        $articlesModel = [];
        foreach($articlesEntities as $a)
        {
            $am = new ArticleModel();
            $am->setId($a->getId());
            $am->setTitle($a->getTitle());
            $am->setChapo($a->getChapo());
            $am->setCreatedAt($a->getCreatedAt());
            $am->setPosted($a->getPosted());
            array_push($articlesModel, $am);
        }

        return $articlesModel;

    }
    public function getNombreTotalDePages(int $articleParPage): int {
        $articlesRepo = new ArticleRepository();
        $articlesEntities = $articlesRepo->getAllArticles(); // je prend tout les articles 
        return ceil (count($articlesEntities) / $articleParPage);
    }
    
    public function getAllArticlesWithPagination(int $articleParPage, int $numeroPage) : array
    {
        $articlesRepo = new ArticleRepository();
        $userRepo = new UserRepository();
        $articlesEntities = $articlesRepo->getAllArticles(); // je prend tout les articles 

        $indiceDepart = $articleParPage * ($numeroPage - 1);
        if(  $indiceDepart >= count($articlesEntities) )
            throw new Exception("pagination incorrecte");


        $indiceFin = $articleParPage * $numeroPage - 1;
        if($indiceFin >= count($articlesEntities))
            $indiceFin = count($articlesEntities) - 1;


        $ArticleModel = [];
        for($i = $indiceDepart; $i < $indiceFin + 1; $i++ )
        {
            // Je créer une entité article (titre, chapo...etc) par article
            $a = $articlesEntities[$i];
            $am = new ArticleModel();
            $am->setId($a->getId());
            $am->setTitle($a->getTitle());
            $am->setChapo($a->getChapo());
            $am->setCreatedAt($a->getCreatedAt());
            $am->setPosted($a->getPosted());
            $ArticlesUserEntity = $userRepo->getUserById($a->getUserId());
            $ArticlesUserModel = new UserModel();
            $ArticlesUserModel->setId($ArticlesUserEntity->getId());
            $ArticlesUserModel->setFirstname(ucfirst(strtolower($ArticlesUserEntity->getFirstname()) ));
            $ArticlesUserModel->setLastname(strtoupper($ArticlesUserEntity->getLastname()));
            $ArticlesUserModel->setFullname($ArticlesUserEntity->getFirstname() . ' ' . $ArticlesUserEntity->getLastname());
            $am->setAuthor($ArticlesUserModel);

            array_push($ArticleModel, $am);
        }       
        
        return $ArticleModel;
    }
    public function insertComment(CommentCreationModel $model)
    {

        $CommentRepo = new CommentRepository();
        $entite = new CommentEntity();


        $entite->setAuthorId($model->getAuthorId()); 
        $entite->setArticleID($model->getArticleID()); 
        $entite->setContent($model->getContent());
        $entite->setPublied($model->getPublied());
 
        $CommentRepo->insertComment($entite);

    } 
}