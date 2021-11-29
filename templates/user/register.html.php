<?php 
                if(isset($rvm->success))
                {echo $rvm->success;}  ?>
                  <?php 
                if(isset($rvm->error))
                {echo$rvm->error;}  ?>

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/img1.jpg"
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
              <form id="registerform" action="index.php?controller=UserController&task=register" method="POST">
                <div class="col-md-8 order-md-1">
           
                    <h4 class="mb-3">Inscrivez vous</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="FirstName">Prénom</label>
                            <input type="text" class="form-control" id="FirstName" name="FirstName"  required>
                        </div>
                        <div class="col-md-6 mb-3">
                             <label for="LastName">Nom</label>
                            <input type="text" class="form-control" id="LastName" name="LastName"  required>
                        </div>
                    </div>
                    <div class="mb-3">
                            <label for="email">Email </label>
                            <input type="email" class="form-control" id="email"  name="email" placeholder="Vous@Exemple.fr">
                    </div>

                    <div class="mb-3">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" minlength="8" required>
                    </div>

                    <div class="mb-3">
                            <label for="passwordverif">Saisissez votre nouveau mot de passe </label>
                            <input type="password" class="form-control" id="passwordverif" name="passwordverif" minlength="8" required>
                    </div>

                    <div class="pt-1 mb-4">
                        <button class="btn-primary btn-lg btn-block" type="submit">S'enregistrer</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
