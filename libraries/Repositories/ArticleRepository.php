<?php
require_once('DataBase/database.php');
require_once('libraries/models/Entity/article.entity.php');

class ArticleRepository
{
    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    private function toArticleEntity($line): ArticleEntity {
        $article = new ArticleEntity();
        $article->setId(intval($line['id']));
        $article->setTitle($line['title']);
        $article->setChapo($line['chapo']);
        $article->setContent($line['content']);
        $article->setUserId(intval($line['user_id']));
        $article->setCreatedAt(new DateTime($line['created_at']));
        $article->setPosted($line['posted'] === null ? false : $line['posted']);
        return $article;
    }

    public function getAllArticles(): array
    {
        $query = $this->pdo->prepare("SELECT a.* FROM articles as a  WHERE posted=1 ORDER BY created_At DESC");
        $query->execute();

        $allArticles = [];
        while ($articleLine = $query->fetch()) {
            array_push($allArticles, $this->toArticleEntity($articleLine)); // a chaque tour de boucle je cré un article et je le met dans mon tableau
        }
        return $allArticles; // c'est un tableau qui sera rempli au fur et à mesure de la requette.
    }

    public function getOneArticle(int $id): ?ArticleEntity
    {
        $query = $this->pdo->prepare("SELECT a.* FROM articles as a where a.id = :id");
        $query->execute(['id' => $id]);
        $articleLine = $query->fetch();

        $article = null;
        if ($articleLine !== false) {
            $article = $this->toArticleEntity($articleLine);
        }
        return $article;
    }


}
