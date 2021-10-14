<?php

namespace Models;

/**
 * DANS CE FICHIER ON DEFINIT UNE CLASSE QUI AURA POUR BUT DE GERER LES DONNEES DES ARTICLES
 * 
 * On appelle souvent cela un Model (une 3 composantes de l'artchitecture MVC)
 */

/**
 * Classe qui gère les données des articles
 */
class Article extends Model
{
    protected $table = "articles";
    
    public function update($title,$content,$article_id, $created_at)
    {
        $e = [ // je créer un tableau $edite qui contiendra les variables a mettre a jour
            'title'     => $title,
            'content'   => $content,
            'created_at'    => $created_at,
            'article_id'  => $article_id
        ];
        $sql = "UPDATE articles SET title=:title, content=:content, created_at=:created_at WHERE id=:article_id";
        $query = $this->pdo->prepare($sql);
        $query->execute($e);
    }
    public function lastId() {
        $lastid = $this->pdo->lastInsertId();
        return $lastid;
    }

    PUBLIC function countArticles(){
        
    

        $sql = "SELECT COUNT* FROM {$this->table}";
        $resultats = $this->pdo->query($sql);
        $items = $resultats->fetchAll();
        $nbArticles = (int) $items['nb_articles'];
        return $nbArticles;



       


    }
}