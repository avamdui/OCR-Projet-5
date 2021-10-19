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
foreach($articles as $article) : { ?>
        <div class="card text-center">
            <div class="row ">
                    <div class="col-4">
                        <img class="card-img" src="/img/posts/<?= $article['id'] ?>.jpg" >
                    </div>
                    <div class="col-8">
                        <div class="card-body">  
                            <h4 class ="card-title"><?= $article['title'] ?></h4>
                            <div class="card-header"><small class="text-muted">Dernière mise à jour <?= $article['created_at'] ?></small></div>
                            <p class="card-text"><?= $article['chapo'] ?></p>
                            <a class="btn btn-info" href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire la suite</a>
                        </div>
                    </div>
            </div>
        </div>
        

<?php } endforeach ?> <hr>
                    <ul class="nav justify-content-center rounded  ">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="index.php?controller=article&task=blog&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="index.php?controller=article&task=blog&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="index.php?controller=article&task=blog&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
              <br>