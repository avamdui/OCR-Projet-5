<?php ($_SESSION['admin']) ? "" : \Http::redirect('index.php?controller=UserController&task=loginPage');  ?>

<form action="index.php?controller=ArticleController&task=editArticle" method="POST" enctype="multipart/form-data">
    <div class="row">
        <Div class="col-lg-4">
            <br>
            <img class="card-img" src="/img/posts/<?php echo $avm->article->getId() ?>.jpg">
            <label for="form-post-thumbnail">Miniature</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input image-gallery" id="image-gallery" name="image" accept=".jpg">
                <label class="custom-file-label " for="form-post-image">(Qualité optimale : 800x600)</label>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card-body">


                <div class="card-header"><small class="text-muted">Dernière mise à jour : <?= $avm->article->getCreatedAt()->format('d/m/Y') ?></small></div>
                <div class="card-header"><small class="text-muted">Par : <?= $avm->article->getAuthor()->getFullname() ?></small></div>
                <hr>

                <div class="mb-3">
                    <label class="form-label" for="title">Titre de l'article : </label>
                    <input type="text" class="form-control" name="title" id="title" value="<?= $avm->article->getTitle() ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="chapo">Chapô de l'article : </label>
                    <textarea type="text" class="form-control" name="chapo" id="chapo" required rows="3"><?= $avm->article->getChapo() ?></textarea>
                </div>

                <br>
                <div class="mb-3">
                    <label class="form-label" for="content">Contenu de l'article : </label>
                    <textarea height="auto" class="form-control" rows="15" name="content" id="content" required><?= $avm->article->getContent() ?></textarea>
                </div>
                <br>
                <input type="hidden" name="articleId" value="<?= $avm->article->getId() ?>">
                <hr>
                <div class="col-auto text-center">
                    <a href="index.php?controller=ArticleController&task=showAllArticlesWithPagination" class="btn btn-info">Retour </a>

                    <button type="submit" class="btn btn-info">Modifier l'article </button>
                </div>

            </div>
        </div>
    </div>
</form>
</div>