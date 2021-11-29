<?php
require_once('libraries/services/BlogService.php');
require_once('libraries/services/UserService.php');
require_once('libraries/services/ModificationService.php');


require_once('libraries/models/view/Article.view.php');
require_once('libraries/models/view/Articles.view.php');
require_once('libraries/models/model/ArticleModification.model.php');
require_once('libraries/models/model/UserLogin.model.php');



require_once('libraries/Http.php');
require_once('libraries/renderer.php');

class UserController
{
    protected $modelName = "Login";

    public function loginPage()
    {
       $errorMessage = "";
       $succesMessage = ''; 
       $pageTitle = "Connexion";
       \Renderer::render('home/login', compact('pageTitle', 'succesMessage', 'errorMessage'));
     }


    public function login() 
    {
        $userModel = New UserLoginModel();
        
        $userModel->setEmail($_POST['email']);
        $userModel->setPassword($_POST['password']);

        $service = new UserService();

        $errors = [];

        if(empty($_POST['email']) || empty($_POST['password']))
        {
            $errors['empty'] = "Tous les champs n'ont pas été remplis!";
        }else if($service->isAdmin($userModel) == 0)
        {
            $errors['exist']  = "Cet administrateur n'existe pas";
        }else{
            session_start();
            
            $_SESSION['admin'] = $service-> findUserwithmail($userModel)->getEmail();
            $_SESSION['first_name'] = $service-> findUserwithmail($userModel)->getFirstname();
            $_SESSION['idUsers'] = $service-> findUserwithmail($userModel)->getId();
                      
            \Http::redirect('index.php?controller=DashBoardController&task=welcomArticles');
             }
    }

    function logout() {
        session_start(); 
        session_destroy();
        \Http::redirect('../index.php');
    }
}


