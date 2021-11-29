<?php
require_once('libraries/database.php');
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
        $article->setPosted($line['posted']);
        return $article;
    }

    public function getAllArticles(): array
    {
        $query = $this->pdo->prepare("SELECT a.* FROM articles as a ORDER BY created_At DESC");
        $query->execute();

        $allArticles = [];
        while ($articleLine = $query->fetch()) {
            array_push($allArticles, $this->toArticleEntity($articleLine));
        }
        return $allArticles;
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
    //---------------------------------------------------------------------------------------------------------------------   
    public function deleteArticle($id): void
        {

            $query = $this->pdo->prepare("DELETE FROM Articles  WHERE id = :id");
            $query->execute(['id' => $id]);
        }
    //---------------------------------------------------------------------------------------------------------------------   
    public function insertArticle(ArticleEntity $articleEntity): int
        {
            $query = $this->pdo->prepare('INSERT INTO Articles(title, chapo, created_at, user_id, content, posted) VALUES(?, ?,  NOW(), ?, ?,?)');
            $query->execute(
            array
            (
                $articleEntity->getTitle(), 
                $articleEntity->getChapo(), 
                $articleEntity->getUserId(), 
                $articleEntity->getContent(),
                $articleEntity->getPosted()
            ));

            return $this->pdo->lastInsertId();

        }

//---------------------------------------------------------------------------------------------------------------------   
    public function updateArticle(ArticleEntity $articleEntity) : int
    {

        $e = [
            'title'     => $articleEntity->getTitle(),
            'content'   => $articleEntity->getContent(),
            'chapo' => $articleEntity->getChapo(),
            'article_id'  => $articleEntity->getId()
        ];
        $sql = "UPDATE articles SET title=:title, content=:content, created_at=NOW(), chapo=:chapo WHERE id=:article_id";
        $query = $this->pdo->prepare($sql);
        $query->execute($e);
        return $this->pdo->lastInsertId();
    }
   // ---------------------------------------------------------------------------------------------------------------------   
    public function changeStatus(ArticleEntity $entite)
    {
        $id = $entite->getID();
        $posted = $entite->getPosted();
        $e = [
            'posted' => $posted,
            'article_id'  => $id
        ];
        $sql = "UPDATE articles SET posted=:posted WHERE id=:article_id";
        $query = $this->pdo->prepare($sql);
        $query->execute($e);
    }

    //------------------------------------------------------------------------------------------------------------------   
    public function countArticlesUnpost()
    {

    $sql = "SELECT COUNT(*) AS nb_articlesUnpost FROM articles WHERE posted=0" ;
    $query = $this->pdo->prepare($sql);
    $query->execute();
    $result = $query->fetch();
    $ArticlesUnpost = (int) $result['nb_articlesUnpost'];
    return $ArticlesUnpost;
    }
   // ---------------------------------------------------------------------------------------------------------------------   

}
