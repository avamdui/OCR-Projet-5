<?php
require_once('libraries/services/BlogService.php');
require_once('libraries/services/ModificationService.php');
require_once('libraries/models/view/Article.view.php');
require_once('libraries/models/view/Articles.view.php');
require_once('libraries/models/model/ArticleModification.model.php');
require_once('libraries/Http.php');
require_once('libraries/renderer.php');

class ArticleController
{
    protected $msg = [];
    public function showOneArticle()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $article = (new BlogService())->getOneArticleWithComments($id);

        $avm = new ArticleViewModel();
        $avm->article = $article;
        $avm->pageTitle = $article->getTitle() . ' by ' . $article->getAuthor()->getFullname();

        \Renderer::render('articles/show', compact('avm'));
    }

    public function showAllArticles()
    {
        $articles = (new BlogService())->getAllArticles();
        $asvm = new ArticlesViewModel();
        $asvm->articles = $articles;
        \Renderer::render('articles/blog', compact('asvm'));
    }



    public function showAllArticlesWithPagination()
    {
        $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
        if (isset($page) && !empty($page)) {
            $currentPage = (int) strip_tags($page);
        } else {
            $currentPage = 1;
        }
        $articleParPage = 5;

        $service = new BlogService();
        $articles = $service->getAllArticlesWithPagination($articleParPage, $currentPage);

        $asvm = new ArticlesViewModel();
        $asvm->articles = $articles;
        $asvm->pageTitle = 'Nos articles - page ' . $currentPage;
        $asvm->currentPage = $currentPage;
        $asvm->totalPage = $service->getNombreTotalDePages($articleParPage);
        if (isset($_GET['msg']) && !empty($_GET['msg'])) {
            $msg['success'] = '<div class="alert alert-success" role="alert"><h4>Publication réussite</h4></div>';
            $asvm->msg;
        }

        \Renderer::render('articles/blog', compact('asvm'));
    }

    public function deleteArticle()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $article = new ModificationService();
        // Je créer l'objet Article avec les commentaires. 

        $id = $article->deleteArticle($id); // Je veut lancer la suppression de l'article
        $article->deleteArticleComments($id); //Puis la suppressions des commentaires

        //suppression de l'image
        $extension = '.jpg';
        $path = '.././img/posts/' . $id . $extension;
        unlink($path);

        \Http::redirect("index.php?controller=ArticleController&task=showAllArticlesWithPagination&page=1");
    }

    public function addpost()
    {

        $pageTitle = "Ajouter un article";
        \Renderer::render("articles/addpost", compact('pageTitle'));
    }

    public function insertArticleandImage()
    {
        // Controller les infos
        // ViewModel avec les erreurs et avec les valeurs deja saisies

        // Enregistrement de l'article
        $model = new ArticleCreationModel();
        $model->setAuthorId(1);
        $model->setChapo(filter_input(INPUT_POST, "chapo", FILTER_SANITIZE_SPECIAL_CHARS));
        $model->setContent(filter_input(INPUT_POST, "content", FILTER_SANITIZE_SPECIAL_CHARS));
        $model->setTitle(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));

        $service = new ModificationService();
        $nouvelId = $service->insertArticle($model);

        // Enregistrement de l'image

        $extension = '.jpg';
        $path = '.././img/posts/' . $nouvelId . $extension;
        $tmpName = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmpName, $path);

        // Redirection vers le blog
        \Http::redirect("index.php?controller=articleController&task=showOneArticle&id=" . $nouvelId);
    }


    public function editArticle()
    {

        // Enregistrement de l'article
        $model = new ArticleModificationModel();
        $model->setId(filter_input(INPUT_POST, "articleId", FILTER_SANITIZE_SPECIAL_CHARS));
        $model->setChapo(filter_input(INPUT_POST, "chapo", FILTER_SANITIZE_SPECIAL_CHARS));
        $model->setContent(filter_input(INPUT_POST, "content", FILTER_SANITIZE_SPECIAL_CHARS));
        $model->setTitle(filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS));

        $service = new ModificationService();
        $service->editArticle($model);
        $id = filter_input(INPUT_GET, "articleId", FILTER_SANITIZE_SPECIAL_CHARS);


        // Suppression ancienne image
        $extension = '.jpg';
        $path = '.././img/posts/' . $id . $extension;
        unlink($path);

        // Enregistrement de l'image

        $extension = '.jpg';
        $path = '.././img/posts/' . $id . $extension;
        $tmpName = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmpName, $path);

        // Redirection vers le blog

        \Http::redirect("index.php?controller=articleController&task=showAllArticlesWithPagination&msg=succeed");
    }
}
