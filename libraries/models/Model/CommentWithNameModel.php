<?php
require_once('libraries/models/model/User.model.php');
class CommentWithNameModel extends UserModel
{
    private $id;
    private $authorId;
    private $articleId;
    private $content;
    private $createdAt;
    private $publied;
    private $censored;
    
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
    public function getAuthorId(): int
    {
        return $this->authorId;
    }
    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    //--------------------------------------------------------------------------     
    public function getArticleId(): int
    {
        return $this->articleId;
    }
    public function setArticleId(int $articleId): void
    {
        $this->articleId = $articleId;
    }
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
    public function isCensored(): bool
    {
        return $this->censored;
    }
    public function setCensored(bool $censored): void
    {
        $this->censored = $censored;
    }
}
