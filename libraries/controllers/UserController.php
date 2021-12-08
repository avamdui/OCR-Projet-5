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
        $userLoginModel = new UserLoginModel();
        $lvm = new LoginViewModel();
        $service = new UserService();
        $pageTitle = 'Mon blog';
        $password = sha1(filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS));;
        $lvm->pageTitle;
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $userLoginModel->setEmail($email);
        $userLoginModel->setPassword($password);
        $msg = [];

        if (empty($email) || empty($password)) {
            $lvm->msg['empty'] = '<div class="alert alert-danger" role="alert"><h4> Merci de compléter tous les champs! </div';
        } else {

            if ($service->isRegister($userLoginModel) == 0) {
                $lvm->msg['exist']  = "Cet utilisateur n'existe pas ou le compte n'est pas validé";
            } else {
                $lvm->msg['Bienvenue']  = '<div class="alert alert-success" role="alert"><h4>Identification réussie, bienvenue !!</h4></div>';
                $_SESSION['user'] = $service->findUserwithmail($userLoginModel)->getEmail();
                $_SESSION['first_name'] = $service->findUserwithmail($userLoginModel)->getFirstname();
                $_SESSION['idUsers'] = $service->findUserwithmail($userLoginModel)->getId();
            }
        }

        Renderer::render('home/contact', compact('lvm'));
    }

    public function logout()
    {
        session_start();
        session_destroy();
        \Http::redirect('../index.php');
    }

    public function mapage()

    {

        $email = $_SESSION['user'];
        $service = new UserService();
        $userModel = new UserLoginModel();
        $userModel->setEmail($email);
        $user =  $service->findUserwithmail($userModel);

        $ArticleandComment =  (new UserService)->getAllCommentsUser($user->getID());

        $uvm = new UserViewModel();
        $uvm->user = $user;
        $uvm->ArticleandComment = $ArticleandComment;


        \Renderer::render('user/userpage', compact('uvm'));
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
        $userModel = new UserLoginModel();
        $rvm = new RegisterViewModel();
        $service = new UserService();
        $msg = [];

        $userModel->setEmail(filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($service->exist($userModel))) {
            $rvm->msg['exist'] = '<div class="alert alert-danger" role="alert"><h4> Utilisateur déja existant !</h4> </div>';
            \Renderer::render('user/register', compact('rvm'));
        } else {
            $userModel->setRole('user');
            $userModel->setFirstname(filter_input(INPUT_POST, "FirstName", FILTER_SANITIZE_SPECIAL_CHARS));
            $userModel->setLastname(filter_input(INPUT_POST, "LastName", FILTER_SANITIZE_SPECIAL_CHARS));
            if (filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS) !== filter_input(INPUT_POST, "passwordverif", FILTER_SANITIZE_SPECIAL_CHARS)) {
                $rvm->msg['different'] = '<div class="alert alert-danger" role="alert"><h4> Les mots de passe ne correspondent pas !</h4> </div>';
                \Renderer::render('user/register', compact('rvm'));
            } else {
                $userModel->setPassword(sha1(filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS)));
                $userModel->setStatus('unactive');
                $service->newuser($userModel);
                $service->sendActivationMail($userModel);
                $rvm->msg['success'] = '<div class="alert alert-success" role="alert"><h4>Inscrition faite, vous pouvez vous connecter!!</h4></div>';
                \Renderer::render('user/register', compact('rvm'));
            }
        }
    }

    public function activateAccount()
    {
        $userModel = new UserLoginModel();
        $service = new UserService();
        $lvm = new LoginViewModel();

        $msg = [];
        $email = filter_input(INPUT_GET, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $userModel->setEmail(urldecode($email));
        $service->activateAccount($userModel);

        $lvm->msg['validation'] = '<div class="alert alert-success" role="alert"><h4>Compte activé, vous pouvez vous connecter!!</h4></div>';
        $pageTitle = 'Mon blog';
        $lvm->pageTitle;


        Renderer::render('home/contact', compact('lvm'));
    }
}
