
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
        foreach($articles as $article) : { ?>
              <tr>
                <th scope="row"><?= $article['id'] ?></th>
                <td><?= $article['title'] ?></td>
                <td>
                <form method='post' action='index.php?controller=Article&task=changestat'>
                    <input type='hidden' id='id' name='id' value='<?= $article['id'] ?>' />
                    <input type='hidden' id='etat' name='etat' value='<?= $article['posted'] ?>' />
                    <button type="submit">
                      <img id='voyant' src='<?php if($article['posted']==1){echo 'img/feuvert.png';}else{echo 'img/feurouge.png';} ?>' height=25 />
                    </button>
                    
                </form>
                </div>
              </tr>
        <?php } endforeach ?>
      </tbody>
  </table>
</div>