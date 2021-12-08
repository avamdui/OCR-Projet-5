<footer class="footer mt-auto navbar navbar-dark text-white">
  <div class="container-fluid py-3 ">
    <a href="#" class="text-white brand-logo">© 2021 Copyright Vincent Gabrych </a>
    <div class="navbar justify-content-end" id="navbarNavAltMarkup">
      <ul>
        <?php if (!empty($_SESSION)) {
          echo '<li class="btn me-2"><a class="nav-link  text-white"" href="index.php?controller=UserController&task=logout"">Se déconnecter ( ' . $_SESSION['first_name'] . ') </a></li>';
        }
        ?>
      </ul>
    </div>
  </div>
</footer>