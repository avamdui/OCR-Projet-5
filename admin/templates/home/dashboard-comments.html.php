
<div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Auteur</th>
        <th scope="col">Article</th>
        <th scope="col">Commentaire</th>        
        <th scope="col">Publié</th>
      </tr>
    </thead>
      <tbody>
        <?php 
        foreach($dvm->Comments as $Comment) : { ?>
              <tr>
                <th scope="row"><?= $Comment->getAuthor()->getFirstname() ?></th>
                <td><?= substr($Comment->getArticle()->getTitle(),0,50). '...' ?></td>
                <td><?= substr($Comment->getContent(),0,100). '...' ?></td>
                <td>
                <form method='post' action='index.php?controller=DashBoardController&task=ChangeCommentsStatus'>
                    <input type='hidden' id='id' name='id' value='<?= $Comment->getId() ?>' />
                    <input type='hidden' id='etat' name='etat' value='<?= $Comment->isPublied() ?>' />
                    <button type="submit">
                      <img id='voyant' src='<?php if($Comment->isPublied()==1){echo 'img/feuvert.png';}else{echo 'img/feurouge.png';} ?>' height=25 />
                    </button>
                    
                </form>
                </div>
              </tr>
        <?php } endforeach ?>
      </tbody>
  </table>
</div>
