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
            $comment->setArticleID($commentLine['article_id']);
            $comment->setContent($commentLine['content']);
            $comment->setCreatedAt(new DateTime($commentLine['created_at']));
            $comment->setPublied($commentLine['publied'] === null ? false:$commentLine['publied']);
            array_push($allComments, $comment); 
        }

        return $allComments;
    }
    public function deleteArticleComments($id): void
    {
        $query = $this->pdo->prepare("DELETE FROM Comments  WHERE article_Id = :id");
        $query->execute(['id' => $id]);
    }


    public function getAllComments()
    {
    $query = $this->pdo->prepare(" SELECT * FROM Comments ORDER BY created_At DESC"
    );
    $query->execute();
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
  
    public function countCommentsUnpublied(){
        
        $sql = "SELECT COUNT(*) AS nb_comments FROM comments WHERE publied=0" ;
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        $CommentsUnpublied = (int) $result['nb_comments'];
        return $CommentsUnpublied;
    }
    public function ChangeStatus(CommentEntity $entite)
    {
        $id = $entite->getId();
        $publied = $entite->isPublied();
        $e = [ // je créer un tableau $edite qui contiendra les variables a mettre a jour
            'publied' => $publied,
            'id'  => $id
        ];
        $sql = "UPDATE comments SET publied=:publied WHERE id=:id";
        $query = $this->pdo->prepare($sql);
        $query->execute($e);
    }

}
