<?php
class ArticleCreationModel
{
    private $title;
    private $chapo;
    private $content;
    private $authorId;

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
    public function getAuthorId(): int
    {
        return $this->authorId;
    }
    public function setAuthorId(int $authorId)
    {
        $this->authorId = $authorId;
    }
}
