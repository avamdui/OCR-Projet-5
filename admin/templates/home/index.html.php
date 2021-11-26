<?php session_start(); ($_SESSION['admin']) ? "" : \Http::redirect('index.php?controller=UserController&task=loginPage') ;  ?>
<br><br>
<div class= "row card-group d-flex justify-content-between "">
  <div class="card text-white bg-primary mb-3" style="width: 18rem; min-height: 10rem; margin:5px;">
    <a href="index.php?controller=DashBoardController&task=welcomArticles" class="card-header text-white">Publication</a>
    <div class="card-body">
      <h5 class="card-title"><?= $dvm->countArticlesUnpublied ?> Articles non publié </h5>
    </div>
  </div>

  <div class="card text-white bg-success mb-3" style="width: 18rem; min-height: 10rem; margin:5px;">
    <a href="index.php?controller=DashBoardController&task=welcomComments" class="card-header text-white">Commentaires</a>
    <div class="card-body">
      <h5 class="card-title"><?= $dvm->countCommentsUnpublied ?> Commentaires à valider</h5>
    </div>
  </div>
</div>

<div class="container">

<?= require $dvm->dashboard_content ?> 

</div>