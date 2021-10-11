
<nav class="navbar navbar-expand-lg text-white py-3">
    <div class="container-fluid "
            <a href="#" class="text-white brand-logo"><img src="../img/logo.png" height="80" alt="" ></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <ul class="nav justify-content-end">
                    <li class="btn me-2"><a class="nav-link  text-white" href="index.php">Gestion</a></li>
                    <li class="btn me-2"><a class="nav-link text-white" href="index.php?controller=article&task=blog">Publier</a></li>
                    <?php if (!empty($_SESSION)){
                    echo '<li class="btn me-2"><a class="nav-link  text-white"" href="index.php?controller=login&task=logout"">Se déconnecter ( ' . $_SESSION['first_name'] . ') </a></li>';
                    }
                    ?>
                </ul>
            </div>
    </div>
</nav>