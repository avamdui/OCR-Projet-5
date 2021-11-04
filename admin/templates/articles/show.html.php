<?php ($_SESSION['admin']) ? "" : \Http::redirect('index.php?controller=Login&task=loginPage') ;  ?>


<div class="input-group" >
<form action="index.php?controller=Article&task=editPost&article_id=<?= $avm['id'] ?>" method="POST" enctype="multipart/form-data" >
    <div class="row">
        <Div class="col-lg-4">
            <br>
            <img class="card-img" src="/img/posts/<?= $article_id ?>.jpg" >
            <label for="form-post-thumbnail">Miniature</label>
            <div class="custom-file">
                        <input type="file" class="custom-file-input " name="image" id="form-post-image">
                        <label class="custom-file-label " for="form-post-image">(Qualité optimale : 800x600)</label>
            </div>
            </div>
            
        <div class="col-lg-8">
            <div class="card-body">
                
                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger ?>" role="alert">
                            <span><?= $error ?></span>
                        </div>
                    <?php } ?>
                
                    <div class="card-header"><small class="text-muted">Dernière mise à jour : <?= $avm['created_at'] ?></small></div>
                    <hr>

                    <div class="mb-3">
                            <label  class="form-label"for="title">Titre de l'article : </label>
                            <input type="text" class="form-control" name="title" id="title" value="<?= $avm['title'] ?>" required>
                    </div>

                    <div class="mb-3">
                            <label  class="form-label"for="chapo">Chapô de l'article : </label>
                            <textarea type="text" class="form-control" name="chapo" id="chapo" required rows="3"  ><?= $avm['chapo'] ?></textarea>
                    </div>
                
                    <br>
                    <div class="mb-3">
                        <label class="form-label" for="content">Contenu de l'article : </label>
                        <textarea height="auto" class="form-control" rows="15" name="content" id="content" required><?= $avm['content'] ?></textarea>
                    </div>
                    <br>
            
                    <hr> 
                    <div class="col-auto text-center">  
                    <a href="index.php?controller=article&task=blog" class="btn btn-info">Retour </a>
                    <button type="submit" class="btn btn-info">Modifier l'article </button>
                    </div>
                
            </div>
        </div>
    </div>
</form>
</div>


