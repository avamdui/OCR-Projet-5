<?php
class ArticleModificationModel
{
    private $id;
    private $title;
    private $chapo;
    private $content;

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
}
