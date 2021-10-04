
<br><br>

<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-sm-6 col-md-5">
          <div class="about-img">
            <img src="assets/img/testimonial-2.jpg" class="img-fluid img-thumbnail opacity-75" alt="">
          </div>
      </div>

        <div class="col-sm-6 col-md-7">
          <div class="about-info">
            <p><span class="text-primary">Nom: </span> <span>Vincent Gabrych</span></p>
            <p><span class="text-primary">Emploi: </span> <span>Chargé d'activité Développement Outils Digitaux et infocentre</span></p>
            <p><span class="text-primary">Email: </span> <span>Vincent.gabrych@gmail.com</span></p>
            <p><span class="text-primary">Téléphone: </span> <span>06-31-06-82-25</span></p>
          </div>
        </div>
        </div>
        <div class="skill-mf">
          <h4>SKILLS</h4>
            <span>HTML</span> <span class="pull-right">85%</span>
            <div class="progress">
              <div class="progress-bar bar1" role="progressbar" " aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span>CSS3</span> <span class="pull-right">70%</span>
            <div class="progress">
              <div class="progress-bar bar2" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span>PHP</span> <span class="pull-right">30%</span>
            <div class="progress">
              <div class="progress-bar bar3" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span>JAVASCRIPT</span> <span class="pull-right">10%</span>
            <div class="progress">
              <div class="progress-bar bar4" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div class="socials">
            <ul>
              <li><a href=""><i class="bi bi-facebook"  ></i></span></a></li>
              <li><a href=""><i class="bi bi-instagram" ></i></span></a></li>
              <li><a href=""><i class="bi bi-twitter"   ></i></span></a></li>
              <li><a href=""><i class="bi bi-linkedin"  ></i></span></a></li>
            </ul>
        </div>
      </div>

      <div class="col-md-6">
        <div class="about-me pt-4 pt-md-0">
          <div class="row">
            <div class="col-sm-12">
                <h2 class="text-success text-center"> <?= $succesMessage ?> </h2>
                <h2 class="text-danger text-center"> <?= $errorMessage ?> </h2>
                <h2 class="text-center">J'ai réponse à tout ! Contactez moi !</h2><br>
                <form id="contactForm" action="index.php?controller=Contact&task=sendMail" method="POST">
                  <!-- Name input -->
                  <div class="mb-3">
                    <label class="form-label" for="name">Nom et prénom</label>
                    <input class="form-control" name="name" id="name" type="text" placeholder="Votre nom et prénom" required data-validation-required-message="Entrez votre nom. />
                  </div>
                  <!-- Email address input -->
                  <div class="mb-3">
                    <label class="form-label" for="email">Votre adresse Email</label>
                    <input class="form-control" name="email" id="email" type="email" placeholder="Adresse@email.com" required data-validation-required-message="Entrez votre adresse email." />
                  </div>
                  <!-- Message input -->
                  <div class="mb-3">
                    <label class="form-label" for="message">Message</label>
                    <textarea class="form-control"  name="message" id="message" type="text" placeholder="Message" style="height: 20rem;" required data-validation-required-message="Entrez un message."></textarea>
                  </div>
                  <!-- Form submit button -->
                  <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Envoyer</button>
                  </div>
                  <br>
                </form>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<br><br><br>
