<?php
namespace Controllers;
class Login extends Controller
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
        session_destroy();
        $errors = [];
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($email) || empty($password))
        {
            $errors['empty'] = "Tous les champs n'ont pas été remplis!";
        }else if($this->model->is_admin($email,$password) == 0)
        {
            $errors['exist']  = "Cet administrateur n'existe pas";
        }else{
            session_start();
            $_SESSION['admin'] = $email;
            \Http::redirect('index.php');
             }
    }
    function logout() { 
        session_destroy();
        \Http::redirect('index.php');
    }
}


