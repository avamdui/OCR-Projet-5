
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
        foreach($comments as $comment) : { ?>
              <tr>
                <th scope="row"><?= $comment['first_name'] ?></th>
                <td><?= substr($comment['title'],0,50). '...' ?></td>
                <td><?= substr($comment['content'],0,100). '...' ?></td>
                <td>
                <form method='post' action='index.php?controller=Comment&task=changestat'>
                    <input type='hidden' id='id' name='id' value='<?= $comment['id'] ?>' />
                    <input type='hidden' id='etat' name='etat' value='<?= $comment['publied'] ?>' />
                    <button type="submit">
                      <img id='voyant' src='<?php if($comment['publied']==1){echo 'img/feuvert.png';}else{echo 'img/feurouge.png';} ?>' height=25 />
                    </button>
                    
                </form>
                </div>
              </tr>
        <?php } endforeach ?>
      </tbody>
  </table>
</div>