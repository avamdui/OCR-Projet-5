<br><br>


<div class="row d-flex justify-content-center" with= 100%>

  <div class="col-8">
    <img src="../../img/welcom.jpg" width= 100% alt="Welcome">
    <img src="../../img/welcom.jpg" width= 100% alt="Welcome">
  </div>

  <div class="col-4">
      <h2 class="text-center">J'ai réponse à tout ! Contactez moi !</h2><br>
      <form id="contactForm" action="index.php?controller=Contact&task=sendMail" method="POST">
        <!-- Name input -->
        <div class="mb-3">
          <label class="form-label" for="name">Nom et prénom</label>
          <input class="form-control" name="name" id="name" type="text" placeholder="Vôtre nom et prénom" />
        </div>
        <!-- Email address input -->
        <div class="mb-3">
          <label class="form-label" for="email">Votre adresse Email</label>
          <input class="form-control" name="email" id="email" type="email" placeholder="Adresse@email.com" />
        </div>
        <!-- Message input -->
        <div class="mb-3">
          <label class="form-label" for="message">Message</label>
          <textarea class="form-control"  name="message" id="message" type="text" placeholder="Message" style="height: 20rem;"></textarea>
        </div>
        <!-- Form submit button -->
        <div class="d-grid">
          <button class="btn btn-primary btn-lg" type="submit">Envoyer</button>
        </div>
      </form>
  </div>
</div>
<br><br>