<?php
namespace Controllers;

 class Index extends Controller
 {
   protected $modelName = "index";

   public function welcom()
   {
      $pageTitle = "Accueil";
      \Renderer::render('home/index', compact('pageTitle'));

   }
  
 }