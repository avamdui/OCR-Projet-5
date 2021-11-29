
<div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Titre</th>
        <th scope="col">Publié</th>
      </tr>
    </thead>
      <tbody>
        <?php 
        foreach($dvm->articles as $article) : { ?>
              <tr>
                <th scope="row"><?= $article->getId() ?></th>
                <td><?= $article->getTitle() ?></td>
                <td>
                <form method='post' action='index.php?controller=DashBoardController&task=ChangeArticleStatus'>
                    <input type='hidden' id='id' name='id' value='<?= $article->getID() ?>' />
                    <input type='hidden' id='etat' name='etat' value='<?= $article->getPosted() ?>' />
                    <button type="submit">
                      <img id='voyant' src='<?php if($article->getPosted()==1){echo 'img/feuvert.png';}else{echo 'img/feurouge.png';} ?>' height=25 />
                    </button>
                    
                </form>
                </div>
              </tr>
        <?php } endforeach ?>
      </tbody>
  </table>
</div>
