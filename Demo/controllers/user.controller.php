<?php
namespace Controllers;

use UserService;

class UserController
{
    public function showUserDetails() 
    {
        
        $id = $_GET['userid'];
        $user = (new UserService())->getOneUser($id);
        $comments = (new BlogService())->getCommentsForUser($id);

        $uvm = new UserViewModel();
        $uvm->user = $user;
        $uvm->comments = $comments;

        \Renderer::render('user/details', $uvm);
    }
}


