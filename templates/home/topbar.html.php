<nav class="navbar navbar-expand-lg navbar-dark bg-primary text-white ">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#"><img src="../img/logo.png" height="80" alt="Blog" ></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mob-navbar" aria-label="Toggle">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="mob-navbar">
                <ul class="nav nav-pills nav-fill ">
                    <li class="nav-item me-2">
                        <a class="nav-link text-white me-2" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link text-white me-2 " href="index.php?controller=ArticleController&task=showAllArticlesWithPagination">Blog</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link text-white me-2" href="index.php?controller=UserController&task=Mapage">Ma Page</a>
                    </li>
                    <?php  if (!empty($_SESSION)){
                    echo '<li class="nav-item me-2"><a class="nav-link text-white me-2"" href="index.php?controller=UserController&task=logout"">Se déconnecter ( ' . $_SESSION['first_name'] . ') </a></li>';
                    }
                    ?>
                </ul>
                <?php if (empty($_SESSION)){  echo'
                <form class="d-flex nav-item" action="index.php?controller=UserController&task=login" method="POST">
                    <input class="form-control me-2" type="email" name="email" placeholder="email" />
                    <input class="form-control me-2" type="password" name="password" placeholder="Password" />
                    <button class="btn btn-warning" type="submit">Login</button>
                </form>';
              }
                ?>
            </div>
        </div>
    </nav> 
    <br>
    