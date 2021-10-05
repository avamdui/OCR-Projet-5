<?php
namespace Controllers;

 class Index extends Controller
 {
   protected $modelName = "index";
   public function welcom()
   {
      $errorMessage = "";
      $succesMessage = ''; 
      $pageTitle = "Accueil";
      \Renderer::render('home/index', compact('pageTitle', 'succesMessage', 'errorMessage'));

   }
  
 
 public function succes()
 
 {
   session_start();
    $errorMessage = "";
    $succesMessage =  "Merci ". $_SESSION['name'] ." votre message à bien été envoyé";
    $pageTitle = "Accueil";
    \Renderer::render('home/index', compact('pageTitle', 'succesMessage', 'errorMessage'));

 }
 
public function errorMAil()
 {  
    
    $succesMessage =  '';
    $errorMessage =  "Votre adresse email n'est pas conforme";
    $pageTitle = "Accueil";
    \Renderer::render('home/index', compact('pageTitle','succesMessage', 'errorMessage'));

 }
}