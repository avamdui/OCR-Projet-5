<?php
class ArticlesModel extends ArticleModel
{
    private $allarticles;
   
    public function getAllArticles(): array
    {
        return $this->allarticles;
    }
    public function setAllArticles(array $allarticles)
    {
        $this->allarticles = $allarticles;
    }

}
