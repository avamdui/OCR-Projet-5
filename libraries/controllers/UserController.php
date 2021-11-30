<?php
require_once('libraries/services/BlogService.php');
require_once('libraries/services/UserService.php');


require_once('libraries/models/view/Article.view.php');
require_once('libraries/models/view/Articles.view.php');
require_once('libraries/models/model/UserLogin.model.php');
require_once('libraries/models/view/User.View.php');
require_once('libraries/models/view/register.View.php');
require_once('libraries/models/view/Login.View.php');



require_once('libraries/Http.php');
require_once('libraries/renderer.php');

class UserController
{
    public function login() 
    {
        $userModel = New UserLoginModel();
        $lvm = new LoginViewModel();
        
        $userModel->setEmail($_POST['email']);
        $userModel->setPassword($_POST['password']);

        $service = new UserService();
        $pageTitle = 'Mon blog';
        $lvm->pageTitle;
        $msg = [];

        if(empty($_POST['email']) || empty($_POST['password']))
        {
            $lvm->msg['empty'] = '<div class="alert alert-danger" role="alert"><h4> Merci de compléter tous les champs! </div';
        }else if($service->isRegister($userModel) == 0)
        {
            $lvm->msg['exist']  = "Cet utilisateur n'existe pas ou le compte n'est pas validé";
        }else{
            
            $lvm->msg['Bienvenue']  = '<div class="alert alert-success" role="alert"><h4>Identification réussie, bienvenue !!</h4></div>';
            $_SESSION['user'] = $service-> findUserwithmail($userModel)->getEmail();
            $_SESSION['first_name'] = $service-> findUserwithmail($userModel)->getFirstname();
            $_SESSION['idUsers'] = $service-> findUserwithmail($userModel)->getId();
             }
    
    Renderer::render('home/contact', compact('lvm'));
        
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
        $service = new UserService();
        $msg= [];
        
        $userModel->setEmail($_POST['email']);
        if(!empty($service->exist($userModel))){
            $rvm->msg['exist'] = '<div class="alert alert-danger" role="alert"><h4> Utilisateur déja existant !</h4> </div>';
            \Renderer::render('user/register', compact('rvm'));
            }else{ 
            $userModel->setRole('user');
            $userModel->setFirstname($_POST['FirstName']);
            $userModel->setLastname($_POST['LastName']);
                if($_POST['password'] !== $_POST['passwordverif'])
                {
                $rvm->msg['different'] = '<div class="alert alert-danger" role="alert"><h4> Les mots de passe ne correspondent pas !</h4> </div>';
                \Renderer::render('user/register', compact('rvm'));
                }else{ 
            $userModel->setPassword($_POST['password']);
            $userModel->setStatus('unactive');
            $service->newuser($userModel);
            $service->sendActivationMail($userModel);
            $rvm->msg['success'] = '<div class="alert alert-success" role="alert"><h4>Inscrition faite, vous pouvez vous connecter!!</h4></div>'; 
            \Renderer::render('user/register', compact('rvm'));}}
            
    }

    public function activateAccount(){
        $userModel = New UserLoginModel();
        $service = new UserService();
        $lvm = new LoginViewModel();

        $msg = [];
        $userModel->setEmail(urldecode($_GET['email']));
        $service->activateAccount($userModel);
        
        $lvm->msg['validation'] = '<div class="alert alert-success" role="alert"><h4>Compte activé, vous pouvez vous connecter!!</h4></div>';
        $pageTitle = 'Mon blog';
        $lvm->pageTitle;
  

        Renderer::render('home/contact', compact('lvm'));

    }

}
