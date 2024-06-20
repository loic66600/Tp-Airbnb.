<div class="detail-form">
  <?php

  use Core\Session\Session;

  foreach ($logements->medias as $image) : ?>
    <img class="image-detail" src="/assets/image/<?= $image->image_path ?>" alt="maison">
  <?php endforeach; ?>
</div>

<div class="description-detail">
  <p><?= $logements->title ?></p>
  <p><?= $logements->description ?></p>
  <p><?= $logements->price_per_night ?> €</p>
  <p><?= $logements->nb_room ?> chambres</p>
  <p><?= $logements->nb_bed ?> lits</p>
  <p><?= $logements->nb_bath ?> salles de bains</p>
  <p><?= $logements->nb_traveler ?> voyageurs</p>
</div>
<div>
  <!-- TODO : afficher LE LIEUX COMPLET -->
</div>



<div class="detail-equipement">

  <div class="equipement">

    <?php foreach ($logements->equipements as $category => $equipement) : ?>
      <p class="title-equipement"><?= $category ?></p>
      <ul class="list-equipement">
        <?php foreach ($equipement as $equipement) : ?>
          <img class="image-equipement" src="/assets/image/iconeequipements/<?= $equipement->image_path ?>" alt="equipements">
          <li><?= $equipement->label ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endforeach; ?>
  </div>


  <form method="POST" action="/reservation/<?= $logements->id ?>">
    <input type="hidden" name="price_per_night" value="<?= $logements->price_per_night ?>">
    <input type="hidden" name="logement_id" value="<?= $logements->id ?>">

    <div class="reservation">
      <div class="booking-summary">
        <div class="price-info">
          <span class="original-price">230 €</span> <span class="discounted-price"><?= $logements->price_per_night ?> €</span> par nuit
        </div>
        <div class="details">
          <div class="date">
            <div class="arrival">

              <label for="arrival">ARRIVÉE</label>
              <input name="date_start" type="date" id="arrival" value="2024-06-18">
            </div>
            <div class="departure">
              <label for="departure">DÉPART</label>
              <input name="date_end" type="date" id="departure" value="2024-06-23">
            </div>
          </div>
          <div class="travelers">
            <label for="travelers">Adultes</label>
            <input type="number" min="1" value="1" id="travelers" name="nb_adult">


          </div>
          <div class="travelers">
            <label for="travelers">Enfants</label>
            <input type="number" min="0" value="1" id="travelers" name="nb_child">
          </div>
        </div>
        <?php if ($form_result && $form_result->hasErrors()) : ?>
          <div class="alert alert-danger" role="alert">
            <?= $form_result->getErrors()[0]->getMessage() ?>
          </div>
          <script>
            setTimeout(function() {
              <?php
              Session::remove(Session::FORM_RESULT);
              ?>
            }, 300);
            setTimeout(function() {
              document.querySelector('.alert-danger').remove();
            }, 3000);
          </script>
        <?php endif ?>
        <!-- si j'ai un message de succes on l'affiche -->
        <?php if ($form_success && $form_success->hasSuccess()) : ?>
          <div class="alert alert-success" role="alert">
            <?= $form_success->getSuccessMessage()->getMessage() ?>
          </div>
          <script>
            setTimeout(function() {
              <?php
              Session::remove(Session::FORM_SUCCESS);
              ?>
            }, 300);
            setTimeout(function() {
              document.querySelector('.alert-success').remove();
            }, 3000);
          </script>
        <?php endif ?>
        <?php if ($auth::isAuth()) : ?>
          <button type="submit" class="reserve-button">Réserver</button>
        <?php else : ?>
          <p>vous devez vous <a href="/connexion">connecter </a>pour reserver</p>
        <?php endif; ?>
  </form>
  <div class="note">Aucun montant ne vous sera débité pour le moment</div>

</div>
</div>
</div>
</div>