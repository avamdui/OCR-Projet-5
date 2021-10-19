<?php
namespace Controllers;
class Login extends Getdata
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
        
        $email = GetData::setEmail($_POST['email']);
        $password = GetData::setPassword($_POST['password']);
        $errors = [];

        if(empty($email) || empty($password))
        {
            $errors['empty'] = "Tous les champs n'ont pas été remplis!";
        }else if($this->model->is_admin($email,$password) == 0)
        {
            $errors['exist']  = "Cet administrateur n'existe pas";
        }else{
            session_start();
            $user = $this->model->findUser($email);
            $_SESSION['admin'] = $email;
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['idUsers'] = $user['id'];
            $_SESSION['author'] = $user['author'];
            \Http::redirect('index.php');
             }
    }
    function logout() { 
        session_destroy();
        \Http::redirect('../index.php');
    }
}


