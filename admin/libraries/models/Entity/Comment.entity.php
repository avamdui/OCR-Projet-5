<?php
class CommentEntity
{
    private $id;
    private $authorId;
    private $articleID;
    private $content;
    private $createdAt;
    private $publied;

    public function getArticleID(): int
    {
        return $this->articleID;
    }
    public function setArticleID(int $articleID): void
    {
        $this->articleID = $articleID;
    }
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
    public function isPublied(): int
    {
        return $this->publied;
    }
    public function setPublied(int $publied): void
    {
        $this->publied = $publied;
    }


}

