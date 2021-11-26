<?php
require_once('libraries/models/model/article.model.php');

class ArticlesPaginationModel extends ArticleModel
{
    private $articlepage;
    // public $currentPage;

//----------------------------------------------------------------------------------------------------
    public function getArticlePage(): int
    {
        return $this->articlepage;
    }
    public function setArticlePage(int $articlepage)
    {
        $this->articlepage = $articlepage;
    }
//----------------------------------------------------------------------------------------------------
// public function getCurrentPage(): int
// {
//     return $this->currentPage;
// }
// public function setCurrentPage(int $currentPage)
// {
//     $this->currentPage = $currentPage;
// }
}
