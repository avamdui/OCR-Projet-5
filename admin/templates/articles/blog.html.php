<?php ($_SESSION['admin']) ? "" : \Http::redirect('index.php?controller=UserController&task=loginPage');  ?>
<?php
if (!empty($asvm->msg)) {
    foreach ($asvm->msg as $message) {
        echo $message . "<br/>";
    }
}
?>
<div class="card text-center">
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-8">
            <h2 class="card-title">GESTION DES ARTICLES</h2>
        </div>

    </div>
</div>

<?php

foreach ($asvm->articles as $article) : {
?>
        <div class="card text-center">
            <div class="row ">
                <div class="col-4">
                    <img class="card-img" src="/img/posts/<?= $article->getId() ?>.jpg">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <h4 class="card-title"><?= $article->getTitle() ?></h4>
                        <div class="card-header"><small class="text-muted">Dernière mise à jour <?= $article->getCreatedAt()->format('Y-m-d H:i:s') ?> Par : <?= $article->getAuthor()->getFullname() ?></small></div>
                        <p class="card-text"><?= $article->getChapo() ?></p>
                        <a class="btn btn-info" href="index.php?controller=ArticleController&task=showOneArticle&id=<?= $article->getId() ?>">Modifier cet article</a>
                        <a class="btn btn-info" onclick="return confirm('Êtes vous sur de vouloir supprimer l\'article ?')" href="index.php?controller=ArticleController&task=deleteArticle&id=<?= $article->getId() ?>">Supprimer cet article</a>
                    </div>
                </div>
            </div>
        </div>


<?php }
endforeach  ?>


<hr>
<ul class="nav justify-content-center rounded  ">
    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
    <li class="page-item <?= ($asvm->currentPage == 1) ? "disabled" : "" ?>">
        <a href="/admin/index.php?controller=ArticleController&task=showAllArticlesWithPagination&page=<?= $asvm->currentPage - 1 ?>" class="page-link">Précédente</a>
    </li>
    <?php for ($page = 1; $page <= $asvm->totalPage; $page++) : ?>
        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
        <li class="page-item <?= ($asvm->currentPage == $page) ? "active" : "" ?>">
            <a href="/admin/index.php?controller=ArticleController&task=showAllArticlesWithPagination&page=<?= $page ?>" class="page-link"><?= $page ?></a>
        </li>
    <?php endfor ?>
    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
    <li class="page-item <?= ($asvm->currentPage == $asvm->totalPage) ? "disabled" : "" ?>">
        <a href="/admin/index.php?controller=ArticleController&task=showAllArticlesWithPagination&page=<?= $asvm->currentPage + 1 ?>" class="page-link">Suivante</a>
    </li>
</ul>
<br>