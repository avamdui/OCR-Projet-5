<?php
namespace Controllers;

class Comment extends Controller
{
    protected $modelName = "Comment";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function insert()
    {
        $articleModel = new \Models\Article();

        // On commence par l'author
        $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS);

        // Ensuite le contenu
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);

        // Enfin l'id de l'article
        $article_id = filter_input(INPUT_POST, 'article_id', FILTER_VALIDATE_INT);

        // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
        // Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
        if (!$author || !$article_id || !$content) {
            die("Votre formulaire a été mal rempli !");
        }

        $article = $articleModel->find($article_id);
        // Si rien n'est revenu, on fait une erreur
        if (!$article) {
            die("Ho ! L'article $article_id n'existe pas !");
        }

        // 3. Insertion du commentaire
        $created_at = date('Y-m-d H:i:s');
        $this->model->insert(compact('author', 'content', 'article_id', 'created_at'));

        // 4. Redirection vers l'article en question :
        \Http::redirect('index.php?controller=article&task=show&id=' . $article_id);
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function delete()
    {
        /** * Récupération du paramètre "id" en GET  */
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }
        /**  * Suppression réelle du commentaire
         * On récupère l'identifiant de l'article avant de supprimer le commentaire
         */
        $commentaire = $this->model->find($id);
        $article_id = $commentaire['article_id'];
        $this->model->delete($id);

        /**
         * 5. Redirection vers l'article en question
         */
        
        \Http::redirect('index.php?controller=article&task=show&id=' . $article_id);
    }
}