<?php
namespace Models;

/**
 * DANS CE FICHIER ON DEFINIT UNE CLASSE QUI AURA POUR BUT DE GERER LES DONNEES DES COMMENTAIRES
 * +
 * 
 * On appelle souvent cela un Model (une 3 composantes de l'artchitecture MVC)
 */

/**
 * Classe qui gère les données des commentaires
 */
class Comment extends Model
{
    protected $table = "comments";

    /**
     * Retourne la liste des commentaires pour un article donné
     *
     * @param integer $article_id
     *
     * @return array
     */
    public function findAllWithArticle(int $article_id): array
    {
        // 2. On récupère les commentaires
        $query = $this->pdo->prepare("SELECT a.*,b.first_name,b.last_name from comments as a left join Users as b on a.author = b.id WHERE a.article_id = :article_id ORDER BY created_at ASC");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchALL();

        // 3. On retourne les commentaires
        return $commentaires;
    }    
    public function findAllWithAllArticle()
    {
        // 2. On récupère les commentaires
        $query = $this->pdo->prepare
            ("SELECT a.*,b.first_name,b.last_name, c.title 
            from comments as a 
            left join Users as b on a.author = b.id
            left join articles as C on a.article_id = c.id
            ORDER BY article_id  ASC"
            );
        $query->execute();
        $commentaires = $query->fetchALL();

        // 3. On retourne les commentaires
        return $commentaires;
    }  
    public function countCommentsUnpublied(){
        
        $sql = "SELECT COUNT(*) AS nb_comments FROM comments WHERE publied=0" ;
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        $CommentsUnpublied = (int) $result['nb_comments'];
        return $CommentsUnpublied;
    }
    public function Publied($publied, $comment_id)
    {
        $e = [ // je créer un tableau $edite qui contiendra les variables a mettre a jour
            'publied' => $publied,
            'comment_id'  => $comment_id
        ];
        $sql = "UPDATE comments SET publied=:publied WHERE id=:comment_id";
        $query = $this->pdo->prepare($sql);
        $query->execute($e);
    }
}