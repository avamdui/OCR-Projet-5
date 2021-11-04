<?php
class Article {
    public $id;
    public $title;
    public $chapo;
    public $content;
    public $created_at;
    public $posted;
    
//---------------------------------------------------------------------------------------------------------------------     
    public function getID() 
    {
        return $this->id;
    }
    public function setId($id) 
    {
        $this->title = htmlspecialchars(trim($id));
        return $this->id;
    }
//---------------------------------------------------------------------------------------------------------------------     
    public function getTitle() 
    {
        return $this->title;
    }
    public function setTitle($title) 
    {
        $this->title = htmlspecialchars(trim($title));
        return $this->title;
    }
//--------------------------------------------------------------------------     
    public function getChapo() 
    {
        return $this->chapo;
    }
    public function setChapo($chapo) 
    {
        $this->chapo = htmlspecialchars(trim($chapo));
        return $this->chapo;
    }
//--------------------------------------------------------------------------
    public function getContent() 
    {
        return $this->content;
    }
    public function setContent($Content) 
    {
        $this->content = htmlspecialchars(trim($Content));
        return $this->content;
    }
//--------------------------------------------------------------------------
    public function getCreatedAt() 
    {
        return $this->created_at;
    }
    public function setCreatedAt($created_at) 
    {
        $this->created_at = htmlspecialchars(trim($created_at));
        return $this->created_at;
    }
//--------------------------------------------------------------------------
public function getPosted() 
{
    return $this->posted;
}
public function setPosted($posted) 
{
    $this->posted = htmlspecialchars(trim($posted));
    return $this->posted;
}
//--------------------------------------------------------------------------
}