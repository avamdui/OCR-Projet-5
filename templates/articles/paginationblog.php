
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

    foreach($asvm->articles as $article) : {
        if($article->currentpage == $article->getArticlePage()){ 
        ?>
        <div class="card text-center"> 
            <div class="row ">
                    <div class="col-4">
                        <img class="card-img" src="/img/posts/<?= $article->getId() ?>.jpg" >
                    </div>
                    <div class="col-8">
                        <div class="card-body">  
                            <h4 class ="card-title"><?= $article->getTitle() . " Pages " . $article->getArticlePage() ?></h4>
                            <div class="card-header"><small class="text-muted">Dernière mise à jour <?=  $article->getCreatedAt()->format('Y-m-d H:i:s') ?></small></div>
                            <p class="card-text"><?= $article->getChapo() ?></p>
                            <a class="btn btn-info" href="index.php?controller=article&task=show&id=<?= $article->getId() ?>">Modifier cet article</a>
                            <a class="btn btn-info" onclick="return confirm('Êtes vous sur de vouloir supprimer l\'article ?')" href="index.php?controller=article&task=delete&id=<?=  $article->getId() ?>">Supprimer cet article</a>
                        </div>
                    </div>
            </div>
        </div>
        

<?php } }endforeach  ?>

<hr>
                    <ul class="nav justify-content-center rounded  ">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($asvm->articles->currentPage == 1) ? "disabled" : "" ?>">
                            <a href="/index.php?controller=ArticleController&task=showAllarticlesWithPagination&page=<?= $asvm->articles->currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($page = 1; $page <= $article->getArticlePage(); $page++): ?>
                          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                          <li class="page-item <?= ($asvm->articles->currentPage == $page) ? "active" : "" ?>">
                                <a href="/index.php?controller=ArticleController&task=showAllarticlesWithPagination&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                          <li class="page-item <?= ($asvm->articles->currentPage == $article->getArticlePage()) ? "disabled" : "" ?>">
                            <a href="/index.php?controller=ArticleController&task=showAllarticlesWithPagination&page=<?= $asvm->articles->currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
<br>



<div class="card text-center">
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-8">
            <h2 class="card-title">GESTION DES ARTICLES</h2>
            <h4 class ="card-title">Il y à : <?= 5 ?> Articles</h4>
        </div>
        
    </div>
</div>

<?php 

    foreach($asvm->articles as $article) : {
        if($currentPage == $article->getArticlePage()){ 
        ?>
        <div class="card text-center"> 
            <div class="row ">
                    <div class="col-4">
                        <img class="card-img" src="/img/posts/<?= $article->getId() ?>.jpg" >
                    </div>
                    <div class="col-8">
                        <div class="card-body">  
                            <h4 class ="card-title"><?= $article->getTitle() . " Pages " . $article->getArticlePage() ?></h4>
                            <div class="card-header"><small class="text-muted">Dernière mise à jour <?=  $article->getCreatedAt()->format('Y-m-d H:i:s') ?></small></div>
                            <p class="card-text"><?= $article->getChapo() ?></p>
                            <a class="btn btn-info" href="index.php?controller=article&task=show&id=<?= $article->getId() ?>">Modifier cet article</a>
                            <a class="btn btn-info" onclick="return confirm('Êtes vous sur de vouloir supprimer l\'article ?')" href="index.php?controller=article&task=delete&id=<?=  $article->getId() ?>">Supprimer cet article</a>
                        </div>
                    </div>
            </div>
        </div>
        

<?php } }endforeach  ?>

<hr>
                    <ul class="nav justify-content-center rounded  ">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="/index.php?ArticleController=article&task=showAllarticlesWithPagination&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($page = 1; $page <= $article->getArticlePage(); $page++): ?>
                          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="/index.php?ArticleController=article&task=showAllarticlesWithPagination&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                          <li class="page-item <?= ($currentPage == $article->getArticlePage()) ? "disabled" : "" ?>">
                            <a href="/index.php?ArticleController=article&task=showAllarticlesWithPagination&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
<br>
