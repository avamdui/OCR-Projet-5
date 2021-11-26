<?php
require_once('libraries/services/ContactService.php');
require_once('libraries/renderer.php');
 class ContactController
 { 
   public $success = null;
   public $error = null;
   
 ////////////////////////////////////////////////////////  
   public function welcom()
   {
      $pageTitle = "Accueil";
      \Renderer::render('home/contact', compact('pageTitle'));
   }
 ////////////////////////////////////////////////////////   
   public function sendMail()

  {
    $msg = new MessageMethods;
    $msg->setMessageData();
    $msg->checkFormFields();
    if(empty($msg->error)) 
      {   
          $msg->sendMessage();
          $success = $msg->success;
          \Renderer::render('home/contact', compact('success'));
      }else {$error = $msg->error;
        \Renderer::render('home/contact', compact('error'));}
   
  }
}