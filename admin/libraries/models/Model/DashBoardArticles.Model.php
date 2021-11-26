<?php

class DashBoardArticlesModel
{
    private $id;
    private $title;
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

}
