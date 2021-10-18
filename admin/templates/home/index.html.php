
<?php ($_SESSION['admin']) ? "" : \Http::redirect('index.php?controller=Login&task=loginPage') ;  ?>
<br><br>
<div class= "row card-group d-flex justify-content-between "">
  <div class="card text-white bg-primary mb-3" style="width: 18rem; min-height: 10rem; margin:5px;">
    <div class="card-header">Publication</div>
    <div class="card-body">
      <h5 class="card-title"><?= $countArticlesUnpublied ?> Articles non publié </h5>
    </div>
  </div>

  <div class="card text-white bg-success mb-3" style="width: 18rem; min-height: 10rem; margin:5px;">
    <div class="card-header"> Commentaires</div>
    <div class="card-body">
      <h5 class="card-title"><?= $countCommentsUnpublied ?> Commentaires à valider</h5>
    </div>
  </div>
</div>

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
                      <img id='voyant' src='<?php if($article['posted']==1){echo 'img/feuvert.png';}else{echo 'img/feurouge.png';} ?>' height=30 />
                    </button>
                    
                </form>
                </div>
              </tr>
        <?php } endforeach ?>
      </tbody>
  </table>
</div>
