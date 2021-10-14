<?php
namespace Controllers;

use Models\Article;

date_default_timezone_set('Europe/Paris');

class GetData extends Controller
{
    public $title = null;
    public $content = null;
    public $article_id = null;
    public $email = null;
    public $password = null;
    public $name = null;
    public $message = null;
    public $received = null;
    public $lastid = null;

//--------------------------------------------------------------------------     
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = htmlspecialchars(trim($title));
        return $this->title;
    }
//--------------------------------------------------------------------------
    public function getContent() {
        return $this->content;
    }
    public function setContent($Content) {
        $this->content = htmlspecialchars(trim($Content));
        return $this->content;
    }
//--------------------------------------------------------------------------
    public function getArticle_id() {   
        return $this->article_id;
    }
    public function setArticle_id($article_id) {   
        $this->article_id = htmlspecialchars(trim($article_id));
        return $this->article_id;
    }
//--------------------------------------------------------------------------

    public function getEmail(){
    return $this->email;
    }
    public function setEmail($email) {
    $this->email = htmlspecialchars($email);
    return $this->email;
    }
    //--------------------------------------------------------------------
    public function getPassword(){
    return $this->password;
    }
    public function setPassword($password){
    $this->password = htmlspecialchars($password);
    return $this->password;
    }
//--------------------------------------------------------------------------
    public function getName() {   
        return $this->name;
    }
    public function setname() {   
        $this->name = strip_tags(trim($_POST['name']));
        return $this->name;
    }

//--------------------------------------------------------------------------
    public function getMessage() {   
        return $this->message;
    }
    public function setMessage() {   
        $this->message = strip_tags(trim($_POST['message']));
        return $this->message;
    }

//--------------------------------------------------------------------------
    public function getDate() {   
        return $this->date;
    }
    public function setDate() {   
        $this->date = date('Y-m-d H:i:s');
        return $this->date;
    }

//--------------------------------------------------------------------------

 
}