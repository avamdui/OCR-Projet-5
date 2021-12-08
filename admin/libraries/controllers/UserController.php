<?php
require_once('libraries/services/BlogService.php');
require_once('libraries/services/UserService.php');
require_once('libraries/services/ModificationService.php');


require_once('libraries/models/view/Article.view.php');
require_once('libraries/models/view/login.view.php');
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
        $lvm = new LoginViewModel();
        $lvm->pageTitle = "Connexion";
        \Renderer::render('home/login', compact('lvm'));
    }


    public function login()
    {
        $userModel = new UserLoginModel();
        $password = sha1(filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS));;
        $mail = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $userModel->setEmail($mail);
        $userModel->setPassword($password);

        $service = new UserService();
        $lvm = new LoginViewModel();
        $lvm->pageTitle;
        $msg = [];

        if (empty($mail) || empty($password)) {
            $lvm->msg['empty'] = "Tous les champs n'ont pas été remplis!";
            \Renderer::render('home/login', compact('lvm'));
        } else if ($service->isAdmin($userModel) == 0) {
            $lvm->msg['empty'] = '<div class="alert alert-danger" role="alert"><h4> Identification incorrect </div';
            \Renderer::render('home/login', compact('lvm'));
        } else {
            $_SESSION['admin'] = $service->findUserwithmail($userModel)->getEmail();
            $_SESSION['first_name'] = $service->findUserwithmail($userModel)->getFirstname();
            $_SESSION['idUsers'] = $service->findUserwithmail($userModel)->getId();

            \Http::redirect('index.php?controller=DashBoardController&task=welcomArticles');
        }
    }

    public function logout()
    {
        session_destroy();
        \Http::redirect('../index.php');
    }
}
