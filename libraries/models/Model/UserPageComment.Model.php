<?php

class UserPageCommentsModel 
{
    private $id;
    private $content;
    private $createdAt;
    private $publied;
    private $author;
    private $article;
 


    
    //---------------------------------------------------------------------------------------------------------------------     
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    //---------------------------------------------------------------------------------------------------------------------     

    //--------------------------------------------------------------------------
    public function getContent(): string
    {
        return $this->content;
    }
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
    //--------------------------------------------------------------------------300
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
    //--------------------------------------------------------------------------
    public function isPublied(): bool
    {
        return $this->publied;
    }
    public function setPublied(bool $publied): void
    {
        $this->publied = $publied;
    }
    //--------------------------------------------------------------------------
    public function getAuthor(): ?UserModel
    {
        return $this->author;
    }
    public function setAuthor(UserModel $author)
    {
        $this->author = $author;
    }

    //--------------------------------------------------------------------------
    public function getArticle(): ?ArticleModel
    {
        return $this->article;
    }
    public function setArticle(ArticleModel $article)
    {
        $this->article = $article;
    }
}

