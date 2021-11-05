<?php
class ArticleRepository 
{
    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }
//---------------------------------------------------------------------------------------------------------------------   
    public function getAllArticles($order = "") 
    {
        $sql = "SELECT * FROM Articles";
        if ($order) {
            $sql .= " ORDER BY $order";
        }
        $resultats = $this->pdo->query($sql);
        $articles = $resultats->fetchAll();

        return $articles;
    }
//---------------------------------------------------------------------------------------------------------------------   /
    public function getOneArticle($id) 
    {
        $query = $this->pdo->prepare("SELECT * FROM Articles WHERE id = :id");
        $query->execute(['id' => $id]);
        $articleLine = $query->fetch();

        $article = new ArticleEntity();
        $article->id = $articleLine['id'];
        $article->title = $articleLine['title'];
        $article->chapo = $articleLine['chapo'];
        $article->content = $articleLine['content'];
        $article->created_at = $articleLine['created_at'];
        $article->posted = $articleLine['posted'];

        return $article;

    }
//---------------------------------------------------------------------------------------------------------------------   
public function deleteArticle($id): void
    {

        $query = $this->pdo->prepare("DELETE FROM Articles  WHERE id = :id");
        $query->execute(['id' => $id]);
    }
//---------------------------------------------------------------------------------------------------------------------   
public function insertArticle(array $data)
    {
        $sql = "INSERT INTO Articles (";
        $fields = array_keys($data);
        $sql .= implode(",", $fields) . ") VALUES (";
        $params = array_map(function ($field) {
        return ":$field";
        }, $fields);
        $sql .= implode(", ", $params) . ")";
        $query = $this->pdo->prepare($sql);
        $query->execute($data);
    
    }
//---------------------------------------------------------------------------------------------------------------------   
    public function lastidArticle()
    {
        $lastId = $this->pdo->lastInsertId();
        return $lastId;
    }
//---------------------------------------------------------------------------------------------------------------------   
public function updateArticle($title,$content,$article_id, $created_at, $chapo)
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
//---------------------------------------------------------------------------------------------------------------------   
public function Publied($posted, $article_id)
{
    $e = [ // je créer un tableau $edite qui contiendra les variables a mettre a jour
        'posted' => $posted,
        'article_id'  => $article_id
    ];
    $sql = "UPDATE articles SET posted=:posted WHERE id=:article_id";
    $query = $this->pdo->prepare($sql);
    $query->execute($e);
}
//---------------------------------------------------------------------------------------------------------------------   

    public function lastId() 
    {
        $lastid = $this->pdo->lastInsertId();
        return $lastid;
    }
//---------------------------------------------------------------------------------------------------------------------   
    public function displayPages () 
    {
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
//---------------------------------------------------------------------------------------------------------------------   
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
//---------------------------------------------------------------------------------------------------------------------   
    public function countArticlesUnpost()
    {
        
    $sql = "SELECT COUNT(*) AS nb_articlesUnpost FROM articles WHERE posted=0" ;
    $query = $this->pdo->prepare($sql);
    $query->execute();
    $result = $query->fetch();
    $ArticlesUpost = (int) $result['nb_articlesUnpost'];
    return $ArticlesUpost;
    }
//---------------------------------------------------------------------------------------------------------------------   

}