<?php
require_once('libraries/Repositories/ArticleRepository.php');
require_once('libraries/Repositories/CommentRepository.php');
require_once('libraries/Repositories/UserRepository.php');
require_once('libraries/Models/model/Article.Model.php');
require_once('libraries/Models/model/Article.creation.php');
require_once('libraries/Models/model/Articles.Model.php');
require_once('libraries/Models/model/User.Model.php');
require_once('libraries/Models/model/Comment.Model.php');

class UserService
{
    public function isAdmin($UserLoginModel)
    {
        $userrepo = new UserRepository();
        $userEntity = new UserEntity();
        $userEntity->setEmail($UserLoginModel->getEmail());
        $userEntity->setPassword($UserLoginModel->getPassword());
        return $userrepo->isAdmin($userEntity);
    }

    public function findUserwithmail($UserLoginModel)
    {
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
}
