<?php
require_once('libraries/services/BlogService.php');
require_once('libraries/services/UserService.php');


require_once('libraries/models/view/Article.view.php');
require_once('libraries/models/view/Articles.view.php');
require_once('libraries/models/model/UserLogin.model.php');
require_once('libraries/models/view/User.View.php');
require_once('libraries/models/view/register.View.php');



require_once('libraries/Http.php');
require_once('libraries/renderer.php');

class UserController
{
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
        }else if($service->isRegister($userModel) == 0)
        {
            $errors['exist']  = "Cet administrateur n'existe pas";
        }else{
            session_start();
            $_SESSION['user'] = $service-> findUserwithmail($userModel)->getEmail();
            $_SESSION['first_name'] = $service-> findUserwithmail($userModel)->getFirstname();
            $_SESSION['idUsers'] = $service-> findUserwithmail($userModel)->getId();
                      
            \Http::redirect('index.php');
             }
    }

    public function logout() {
        session_start(); 
        session_destroy();
        \Http::redirect('../index.php');
    }

    public function mapage() 

    {
        $email = $_SESSION['user'];
        
        $service = new UserService();
        $userModel = New UserLoginModel();
        $userModel->setEmail($_SESSION['user']);
        $user =  $service->findUserwithmail($userModel);

        $ArticleandComment =  (new UserService)->getAllCommentsUser($user->getID());

        $uvm = new UserViewModel();
        $uvm->user = $user;
        $uvm->ArticleandComment = $ArticleandComment;
        

        \Renderer::render('user/userpage',compact('uvm'));
    }

    public function deleteComment()
    {
        $Commentid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $service = new UserService();
        $service->deleteComment($Commentid); //suppressions des commentaires
        \Http::redirect("index.php?controller=UserController&task=mapage");
    }

    public function registerPage()
    {
    $rvm = new RegisterViewModel();
    $rvm->pageTitle = "Enregistrement";
    \Renderer::render('user/register', compact('rvm'));
    }

    public function register()
    {
        $userModel = New UserLoginModel();
        $rvm = new RegisterViewModel();
        $userModel->setFirstname($_POST['FirstName']);
        $userModel->setLastname($_POST['LastName']);
        $userModel->setEmail($_POST['email']);
        $userModel->setRole('user');

        if($_POST['password'] !== $_POST['passwordverif'])
            {
            $rvm->error = '<div class="alert alert-danger" role="alert"><h4> Les mots de passe ne correspondent pas !</h4> </div>';
            \Renderer::render('user/register', compact('rvm'));
            }else{ 
        $userModel->setPassword($_POST['password']);
        $service = new UserService();
        $service->newuser($userModel);
        
        $rvm->success = '<div class="alert alert-success" role="alert"><h4>Inscrition faite, vous pouvez vous connecter!!</h4></div>'; 
        \Renderer::render('user/register', compact('rvm'));}
         
     
    }
}
