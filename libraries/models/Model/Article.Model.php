<?php
class ArticleModel
{
    private $id;
    private $title;
    private $chapo;
    private $content;
    private $createdAt;
    private $posted;
    private $recent;

    private $allComments;
    private $allauthor;
    private $author;
    


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
    public function getPosted(): bool
    {
        return $this->posted;
    }
    public function setPosted(bool $posted)
    {
        $this->posted = $posted;
    }
    //---------------------------------------------------------------------------------------------------------------------     
    public function getAllComments(): array
    {
        return $this->allComments;
    }
    public function setAllComments(array $comments)
    {
        $this->allComments = $comments;
    }

    //---------------------------------------------------------------------------------------------------------------------     
    public function getAllAuthor(): array
    {
        return $this->allauthor;
    }
    public function setAllAuthor(array $allauthor)
    {
        $this->allauthor = $allauthor;
    }

    //---------------------------------------------------------------------------------------------------------------------     
    public function getAuthor(): ?UserModel
    {
        return $this->author;
    }
    public function setAuthor(UserModel $author)
    {
        $this->author = $author;
    }
    //--------------------------------------------------------------------------
    public function isRecent(): bool
    {
        return $this->recent;
    }
    public function setRecent(bool $recent): void
    {
        $this->recent = $recent;
    }
}
