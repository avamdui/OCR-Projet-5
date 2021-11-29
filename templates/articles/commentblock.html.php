<form action="index.php?controller=ArticleController&task=insertComment" method="POST">
        <h5>Vous voulez réagir ? N'hésitez pas !</h5>
        
        <textarea name="content" id="" cols="70" rows="5" placeholder="Votre commentaire ..."></textarea>
        <input type="hidden" name="articleId" value="<?= $avm->article->getId() ?>">
        <input type="hidden" name="authorID" value="<?= $_SESSION['idUsers'] ?>">
        <br>
        <button type="submit" class="btn btn-info">Commenter ! </button>
</form>
