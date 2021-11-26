<div class="row">
        <Div class="col-lg-4">
            <br>
            <img class="card-img" src="/img/posts/<?php echo $avm->article->getId() ?>.jpg" >
        </div>
            
        <div class="col-lg-8">
            <div class="card-body">
                    <div class="card-header"><small class="text-muted">Dernière mise à jour : <?= $avm->article->getCreatedAt()->format('d/m/Y') ?></small></div>
                    <div class="card-header"><small class="text-muted">Par : <?= $avm->article->getAuthor()->getFullname() ?></small></div>
                    <hr>

                    <div class="mb-3"><?= $avm->article->getTitle() ?></div>

                    <div class="mb-3"><?= $avm->article->getChapo() ?></div>
                
                    <br>
                    <div class="mb-3"><?= $avm->article->getContent() ?></div>
                    <br>
            
                    <hr> 
                    <div class="col-auto text-center">  
                    <a href="index.php?controller=ArticleController&task=showAllArticlesWithPagination" class="btn btn-info">Retour </a>
                    </div>
            </div>
        </div>
</div>
<div class="card-body Comment">
    <?php if (count($avm->article->getAllComments()) === 0) : ?>
        <h4>Il n'y a pas encore de commentaires pour cet article ... SOYEZ LE PREMIER ! :D</h4>
    <?php else : ?>
        <h4>Il y a déjà <?= count($avm->article->getAllComments()) ?> réactions : </h4>

        <?php foreach ($avm->article->getAllComments() as $commentaire) : if ($commentaire->isPublied() == 1){  ?>
            <h5>Commentaire de <?= $commentaire->getFullname() ?></h5>
            <small>Le <?= $commentaire->getCreatedAt()->format('d/m/Y') ?></small>
            <blockquote>
                <em><?= $commentaire->getContent() ?></em>
            </blockquote>
        <?php } endforeach ?>
    <?php endif ?>

    
    <div class="container">
    <?php if(!empty($_SESSION))
                    {
                        include $avm->commentBlock;
                    }
        ?>           
    </div>

</div>

