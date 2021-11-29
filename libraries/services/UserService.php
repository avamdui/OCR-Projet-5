<?php
require_once('libraries/Repositories/ArticleRepository.php');
require_once('libraries/Repositories/CommentRepository.php');
require_once('libraries/Repositories/UserRepository.php');

require_once('libraries/Models/model/Article.Model.php');
require_once('libraries/Models/model/Articles.Model.php');
require_once('libraries/Models/model/User.Model.php');
require_once('libraries/Models/model/Comment.Model.php');
require_once('libraries/Models/model/UserPageComment.Model.php');

class UserService
{

    public function isRegister(UserLoginModel $UserLoginModel)
    {
        $userrepo = new UserRepository();
        $userEntity = new UserEntity();
        $userEntity->setEmail($UserLoginModel->getEmail());
        $userEntity->setPassword($UserLoginModel->getPassword());
        return $userrepo->isRegister($userEntity);
    }

    public function findUserwithmail(UserLoginModel $UserLoginModel){
        $userrepo = new UserRepository();
        $Usermodel = new UserModel();
        $userEntity = $userrepo->findUser($UserLoginModel->getEmail());
        
        $Usermodel->setId($userEntity->getId());
        $Usermodel->setFirstname(ucfirst(strtolower($userEntity->getFirstname()) ));
        $Usermodel->setLastname(strtoupper($userEntity->getLastname()));
        $Usermodel->setEmail($userEntity->getEmail());
        $Usermodel->setFullname($Usermodel->getFirstname() . ' ' . $Usermodel->getLastname());
        $Usermodel->setRole($userEntity->getRole());
        return $Usermodel;

    }

    public function getAllCommentsUser($userId)
    {
    $commentRepo = new CommentRepository();
    $userRepo = new UserRepository();
    $articleRepo = new ArticleRepository();

    $CommentEntities = $commentRepo->getCommentsFromUser($userId);

    $CommentUserModel = [];

    foreach($CommentEntities as $c)
    {
        $cm = new UserPageCommentsModel();
        $cm->setId($c->getId());
        $cm->setContent($c->getContent());
        $cm->setCreatedAt($c->getCreatedAt());
        $cm->setPublied($c->getPublied());

        $articleEntity = $articleRepo->getOneArticle($c->getArticleID());
        $CommentsUserEntity = $userRepo->getUserById($c->getAuthorId());

        $CommentsUserModel = new UserModel();
        $CommentsUserModel->setFirstname(ucfirst(strtolower($CommentsUserEntity->getFirstname())));
        $CommentsUserModel->setLastname(strtoupper($CommentsUserEntity->getLastname()));
        

        $ArticlesModel = new ArticleModel();
        $ArticlesModel->setTitle($articleEntity->getTitle());

        $cm->setArticle($ArticlesModel);
        $cm->setAuthor($CommentsUserModel);
        array_push($CommentUserModel, $cm);
    }
    
    return $CommentUserModel;
}
    public function deleteComment($Commentid)

    {
        $commentRepo = new CommentRepository();
        $commentRepo->deleteComment($Commentid);
    }

    public function newUser(UserLoginModel $model)
    {

        $userRepo = new UserRepository();
        $entite = new UserEntity();
        $entite->setFirstname($model->getFirstname()); 
        $entite->setLastname($model->getLastname()); 
        $entite->setEmail($model->getEmail());
        $entite->setRole($model->getRole());
        $entite->setPassword($model->getPassword());
        $userRepo->insertUser($entite);

    } 



}
