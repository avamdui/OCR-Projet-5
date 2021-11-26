<?php

class ArticleEntity
{
    private $id;
    private $title;
    private $chapo;
    private $content;
    private $userId;
    private $createdAt;
    private $posted;

    //---------------------------------------------------------------------------------------------------------------------     
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = $id;
    }
    //---------------------------------------------------------------------------------------------------------------------     
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
    //--------------------------------------------------------------------------     
    public function getChapo(): string
    {
        return $this->chapo;
    }
    public function setChapo(string $chapo)
    {
        $this->chapo = $chapo;
    }
    //--------------------------------------------------------------------------
    public function getContent(): string
    {
        return $this->content;
    }
    public function setContent(string $content)
    {
        $this->content = $content;
    }
    //---------------------------------------------------------------------------------------------------------------------     
    public function getUserId(): int
    {
        return $this->userId;
    }
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }
    //--------------------------------------------------------------------------
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }
    //--------------------------------------------------------------------------
    public function getPosted(): int
    {
        return $this->posted;
    }
    public function setPosted(int $posted)
    {
        $this->posted = $posted;
    }
}
