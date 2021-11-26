<?php

class CommentCreationModel
{
    private $id;
    private $authorId;
    private $articleId;
    private $content;
    Private $publied;


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
    //--------------------------------------------------------------------------
}
    public function getPublied(): int
    {
        return $this->publied;
    }
    public function setPublied(int $publied): void
    {
        $this->publied = $publied;
    }

}
