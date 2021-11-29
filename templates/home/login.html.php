<section class="vh-100">
<div class="row">
  <div>
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

              <form id="contactForm" action="index.php?controller=login&task=login" method="POST">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3""></i>
                    <span class="h1 fw-bold mb-0">Inscription</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connectez vous !</h5>

                  <div class="form-outline mb-4">
                    <input  name="email" type="email" id="email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input  name="password" type="password" id="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Connexion</button>
                  </div>

                  <a class="small text-muted" href="#!">Mot de passe oublié ?</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
</section>
