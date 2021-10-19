
<nav class="navbar navbar-expand-lg navbar-dark bg-primary text-white  py-3">
    <div class="container-fluid "
            <a href="#" class="text-white brand-logo"><img src="../img/logo.png" height="80" alt="" ></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <ul class="nav justify-content-end">
                    <li class="btn btn-outline-primary me-2"><a class="nav-link  text-white" href="index.php">Accueil</a></li>
                    <li class="btn btn-outline-primary me-2"><a class="nav-link text-white" href="index.php?controller=article&task=blog">Blog</a></li>
                    <li class="btn btn-outline-primary me-2"><a class="nav-link  text-white"" href="index.php?page=home">Connexion</a></li>
                    <form  action="index.php?controller=login&task=login" method="POST">
                        <li class="btn btn-outline-primary" >
                        <input  name="email" type="email" id="email" class="nav-link" />
                        </li>
                        <li class="btn btn-outline-primary">
                        <input  name="password" type="password" id="password" class="nav-link" />
                        </li>
                        <li class="btn btn-outline-primary">
                        <button class="nav-link" type="submit">V</button>
                        </li>
                    </form>
                </ul>
            </div>
    </div>
</nav>
