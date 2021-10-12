<div class="card text-center">
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-8">
            <h2 class="card-title">GESTION DES ARTICLES</h2>
        </div>
        
    </div>
</div>

<?php ($_SESSION['admin']) ? "" : \Http::redirect('index.php?controller=Login&task=loginPage') ;  ?>

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
                        <a class="btn btn-info" href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Modifier cet article</a>
                        </div>
            </div>
        </div>
        

<?php } endforeach ?> 