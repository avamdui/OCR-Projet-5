
<?php session_start();($_SESSION['admin']) ? "" : \Http::redirect('index.php?controller=UserController&task=loginPage') ;  ?>

<div class="input-group" >
<form action="index.php?controller=ArticleController&task=InsertArticleandImage" method="POST" enctype="multipart/form-data" >
    <div class="row">
        <Div class="col-lg-5">
            <div class="card-body">
                <h2>Ajouter une image</h2>
                <hr>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input " name="image" id="form-post-image">
                        <label class="custom-file-label " for="form-post-image">Ajouter une image (Qualité optimale : 800x600)</label>
                    </div>
                </div>
            </div>
        <div class="col-lg-7">
            <div class="card-body">
                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger ?>" role="alert">
                            <span><?= $error ?></span>
                        </div>
                    <?php } ?>
                    <div class="mb-3"> <h2>Ecrire un article</h2></div>
                    <hr>

                    <div class="mb-3">
                            <label  class="form-label"for="title">Titre de l'article : </label>
                            <input type="text" class="form-control" name="title" id="title" required>
                    </div>

                    <div class="mb-3">
                            <label  class="form-label"for="chapo">Chapô de l'article : (255 caractères maximum) </label>
                            <textarea type="text" class="form-control" name="chapo" id="chapo" required rows="3"></textarea>
                    </div>
                
                    <br>
                    <div class="mb-3">
                        <label class="form-label" for="content">Contenu de l'article : </label>
                        <textarea height="auto" class="form-control" rows="15" name="content" id="content" required></textarea>
                    </div>
                    <br>
            
                    <hr> 
                    <div class="mb-3 text-center">  
                    <a href="index.php?controller=article&task=blog" class="btn btn-info">Retour </a>
                    <button type="submit" class="btn btn-info">Ajouter l'article </button>
                    </div>
                
            </div>
        </div>
    </div>
</form>
</div>


