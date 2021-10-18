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
    public function update($title,$content,$article_id, $created_at, $chapo)
    {
        $e = [ // je créer un tableau $edite qui contiendra les variables a mettre a jour
            'title'     => $title,
            'content'   => $content,
            'created_at'    => $created_at,
            'chapo' => $chapo,
            'article_id'  => $article_id
        ];
        $sql = "UPDATE articles SET title=:title, content=:content, created_at=:created_at, chapo=:chapo WHERE id=:article_id";
        $query = $this->pdo->prepare($sql);
        $query->execute($e);
    }
    public function lastId() {
        $lastid = $this->pdo->lastInsertId();
        return $lastid;
    }

    public function displayPages () {

        $sql = "SELECT COUNT(*) AS nb_articles FROM articles";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch();

        $nbArticles = (int) $result['nb_articles'];
        // On détermine le nombre d'articles par page
        $parPage = 5;

        // On calcule le nombre de pages total
        $pages = ceil($nbArticles / $parPage);
        return $pages;
        
    }

    public function displaysArticles($premier,$parPage)
    {
 

        $sql = "SELECT * FROM articles ORDER BY created_at DESC LIMIT :premier, :parpage;";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':premier', $premier, $this->pdo::PARAM_INT);
        $query->bindValue(':parpage', $parPage, $this->pdo::PARAM_INT);
        $query->execute();
        $articles = $query->fetchAll($this->pdo::FETCH_ASSOC);
        return $articles;
        
    }
    public function findAll($order = ""): array
    {
        // 1. Création de la chaine SQL
        $sql = "SELECT * FROM {$this->table}";

        if ($order) {
            $sql .= " ORDER BY $order";
        }

        // 2. Récupération des items
        $resultats = $this->pdo->query($sql);
        $items = $resultats->fetchAll();

        // 3. On retourne les items
        return $items;
    }
    public function countArticlesUnpost(){
        
        $sql = "SELECT COUNT(*) AS nb_articlesUnpost FROM articles WHERE posted=0" ;
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        $ArticlesUpost = (int) $result['nb_articlesUnpost'];
        return $ArticlesUpost;
    }

}