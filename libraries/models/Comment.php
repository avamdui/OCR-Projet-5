<?php
namespace Models;

class Comment extends Model
{
    protected $table = "comments";

    public function findAllWithArticle(int $article_id): array
    {
        //  On récupère les commentaires
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id ORDER BY created_at ASC");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();

        //  On retourne les commentaires
        return $commentaires;
    }
}