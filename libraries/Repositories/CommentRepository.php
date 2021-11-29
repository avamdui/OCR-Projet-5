<?php
require_once('libraries/database.php');
require_once('libraries/models/Entity/comment.entity.php');

class CommentRepository
{
    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    public function getCommentsByArticleId(int $id): array
    {
        $query = $this->pdo->prepare(
            " SELECT c.* FROM Comments as c Where c.article_id= :id ORDER BY created_At DESC"
        );
        $query->execute(['id' => $id]);

        $allComments = [];
        while ($commentLine = $query->fetch()) {
            $comment = new CommentEntity();
            $comment->setId($commentLine['id']);
            $comment->setAuthorId($commentLine['author_id']);
            $comment->setArticleId($commentLine['article_id']);
            $comment->setContent($commentLine['content']);
            $comment->setCreatedAt(new DateTime($commentLine['created_at']));
            $comment->setPublied($commentLine['publied'] === null ? false:$commentLine['publied']);
            array_push($allComments, $comment); 
        }

        return $allComments;
    }
    public function insertComment(CommentEntity $commentEntity)
    {

        $query = $this->pdo->prepare('INSERT INTO Comments(id, author_id, article_id, content, created_at, publied) VALUES(NULL, ?, ?, ?, NOW(), 0)');
        $query->execute(
        array
        (
            $commentEntity->getAuthorId(), 
            $commentEntity->getArticleID(), 
            $commentEntity->getContent(),

        ));


    }
    public function getCommentsFromUser($id)
    {
    $query = $this->pdo->prepare(" SELECT * FROM Comments WHERE author_id=:author_id ORDER BY created_At DESC"
    );
    $query->execute(['author_id' => $id]);
    $allComments = [];
    while ($commentLine = $query->fetch()) 
        {
            $comment = new CommentEntity();
            $comment->setId($commentLine['id']);
            $comment->setArticleId($commentLine['article_id']);
            $comment->setAuthorId($commentLine['author_id']);
            $comment->setContent($commentLine['content']);
            $comment->setCreatedAt(new DateTime($commentLine['created_at']));
            $comment->setPublied($commentLine['publied'] === null ? false:$commentLine['publied']);
            array_push($allComments, $comment); 
        } 
        
         return $allComments;
    }
    public function deleteComment($Commentid): void
    {
        $query = $this->pdo->prepare("DELETE FROM Comments WHERE id =:id");
        $query->execute(['id' => $Commentid]);

    }


}
