<?php use Core\Session\Session;?>
<div class="form-detail">
        <h1 class="title-first"><?= $logements->title ?></h1>
        <div class="detail-form">
            <?php foreach ($logements->medias as $image) : ?>
                <img class="image-detail " src="/assets/image/<?= $image->image_path ?>" alt="maison">
            <?php endforeach; ?>
        </div>
    </div>

    <div class="title-detail">
        <p><?= $logements->type->label ?> à <?= $logements->address->city ?>, <?= $logements->address->country ?></p>
    </div>
    <div class="description-detail">
        <p><?= $logements->nb_room ?> chambres - <?= $logements->nb_bed ?> lits - <?= $logements->nb_bath ?> salles de bains - <?= $logements->nb_traveler ?> voyageurs</p>
    </div>

    <div class="detail-container">
        <div class="detail">
            <div class="detail-equipement">

                <div class="text-container">
                  <div class="description text ">
                      <p><?= $logements->description ?></p>
                  </div>
                  </div>
                <button id="toggleButton">Voir plus</button>
                <h3>Ce que propose ce logement</h2>
                <div class="equipement">
                    <?php foreach ($logements->equipements as $category => $equipement) : ?>
                        <p class="title-equipement"><?= $category ?></p>
                        <ul class="list-equipement">
                            <?php foreach ($equipement as $equipementItem) : ?>
                                <img class="image-equipement" src="/assets/image/iconeequipements/<?= $equipementItem->image_path ?>" alt="equipements">
                                <li><?= $equipementItem->label ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endforeach; ?>
                </div>
            </div>

            <form method="POST" action="/reservation/<?= $logements->id ?>">
                <input type="hidden" name="price_per_night" value="<?= $logements->price_per_night ?>">
                <input type="hidden" name="logement_id" value="<?= $logements->id ?>">

                <div class="reservation">
                    <div class="booking-summary" id="booking-summary">
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
                                <input type="number" min="0" value="0" id="travelers" name="nb_child">
                            </div>
                        </div>
                        <?php if ($form_result && $form_result->hasErrors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $form_result->getErrors()[0]->getMessage() ?>
                            </div>
                            <script>
                                setTimeout(function() {
                                    <?php Session::remove(Session::FORM_RESULT); ?>
                                }, 300);
                                setTimeout(function() {
                                    document.querySelector('.alert-danger').remove();
                                }, 3000);
                            </script>
                        <?php endif ?>
                        <?php if ($form_success && $form_success->hasSuccess()) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= $form_success->getSuccessMessage()->getMessage() ?>
                            </div>
                            <script>
                                setTimeout(function() {
                                    <?php Session::remove(Session::FORM_SUCCESS); ?>
                                }, 300);
                                setTimeout(function() {
                                    document.querySelector('.alert-success').remove();
                                }, 3000);
                            </script>
                        <?php endif ?>
                        <?php if ($auth::isAuth()) : ?>
                            <button type="submit" class="reserve-button">Réserver</button>
                        <?php else : ?>
                            <p>Vous devez vous <a class="custom-link" href="/connexion">connecter </a>pour reserver</p>
                        <?php endif; ?>
                      <div class="note">Aucun montant ne vous sera débité pour le moment</div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body mt-3 text-center">
        <a href="/" class="btn btn-custom" style="width: 100px;">Retour</a>
    </div>
    <script>
        // JavaScript pour rendre la carte de réservation collante
        window.addEventListener('scroll', function() {
            var bookingSummary = document.getElementById('booking-summary');
            var reservationSection = document.querySelector('.reservation');
            var offset = reservationSection.getBoundingClientRect().top + window.scrollY;
            var marginTop = 20; // Ajustez cette valeur si nécessaire
            var initialLeft = reservationSection.getBoundingClientRect().left; // Position initiale du conteneur

            if (window.scrollY > offset - marginTop) {
                bookingSummary.classList.add('sticky');
                bookingSummary.style.top = marginTop + 'px';
                bookingSummary.style.left = initialLeft + 'px'; // Fixe la position gauche
            } else {
                bookingSummary.classList.remove('sticky');
                bookingSummary.style.top = '';
                bookingSummary.style.left = '';
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
    var container = document.querySelector('.text-container');
    var text = document.querySelector('.text');
    var button = document.getElementById('toggleButton');

    button.addEventListener('click', function() {
        container.classList.toggle('show-full-text');
        if (container.classList.contains('show-full-text')) {
            button.textContent = 'Voir moins';
            container.style.maxHeight = 'none'; // Permet de dérouler tout le texte
        } else {
            button.textContent = 'Voir plus';
            container.style.maxHeight = '300px'; // Retour à la hauteur maximale initiale
        }
    });
});

    </script>