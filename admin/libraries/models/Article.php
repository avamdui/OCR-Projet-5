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

// public function post_img($tmp_name, $extension, $article_id)
//     {   // Création de la fonction
//     $i = [
//         'id'    =>  $article_id,
//         'image' =>  $article_id.$extension      //$id = 25 , $extension = .jpg      $id.$extension = "25".".jpg" = 25.jpg
//     ];
//     $sql = "UPDATE articles SET image=:image WHERE id=:article_id"; 
//     $query = $this->pdo->prepare($sql);
//     $query->execute($i);;
//     move_uploaded_file($tmp_name,"/img/posts/".$article_id.$extension); // Déplacement du fichier de tmp vers la ou on veux
//     }


}