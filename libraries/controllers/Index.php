<?php
namespace Controllers;

class Index extends Controller
{
   protected $modelName = \Models\Index::class;
   public function welcom()
   {
      $pageTitle = "Accueil";
      \Renderer::render('articles/index', compact('pageTitle'));

   }
}
