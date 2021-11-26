<div >Bienvenue sur votre page <?php echo $uvm->user->getFirstname()?>  </div>
<br>
<div> Voici vos commentaires :  </div>



<div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Auteur</th>
        <th scope="col">Article</th>
        <th scope="col">Commentaire</th>        
        <th scope="col"> </th>
      </tr>
    </thead>
      <tbody>
        <?php 
        foreach($uvm->ArticleandComment as $Comment) : { ?>
              <tr>
                <th scope="row"><?= $Comment->getAuthor()->getFirstname() ?></th>
                <td><?= substr($Comment->getArticle()->getTitle(),0,50). '...' ?></td>
                <td><?= substr($Comment->getContent(),0,100). '...' ?></td>
                <td>
                <a class="btn btn-info" onclick="return confirm('Êtes vous sur de vouloir supprimer votre commentaire ?')" href="index.php?controller=UserController&task=deleteComment&id=<?= $Comment->getId() ?>">Supprimer</a>
                        
                </form>
                </div>
              </tr>
        <?php } endforeach ?>
      </tbody>
  </table>
</div>




