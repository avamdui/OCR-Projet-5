<h1>Nos articles</h1>

<?php ($_SESSION['admin']) ? "" : \Http::redirect('index.php?controller=Login&task=loginPage') ;  ?>

<?php 
foreach($articles as $article) : { ?>
        <div class="card text-center">
            <div class="row ">
                <div class="col-4">
                    <img class="card-img" src="../../img/posts/post.png" >
                </div>
                <div class="col-8">
                        <div class="card-body">  
                        <h4 class ="card-title"><?= $article['title'] ?></h4>
                        <div class="card-header"><small class="text-muted">Dernière mise à jour <?= $article['created_at'] ?></small></div>
                        <p class="card-text"><?= $article['introduction'] ?></p>
                        <a class="btn btn-primary" href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire la suite</a>
                        </div>
            </div>
        </div>
        

<?php } endforeach ?> 