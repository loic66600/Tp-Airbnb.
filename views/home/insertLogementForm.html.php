<h1>Mes logements</h1>


<div class="container">
    <div class="cards-container">
        <?php foreach ($vuelogement as $logement) : ?>
            <div class="card-item">
                <div class="card " style="width: 18rem; height: 100%;">
                    <form action="/logement/delete/<?= $logement->id ?>">
                        <div class="card-body ">
                            <?php foreach ($logement->medias as $image) : ?>
                                <img class="card-img" src="/assets/image/<?= $image->image_path ?>" alt="">
                            <?php endforeach; ?>
                            <h3 class="card-title sub-title text-center"><?= $logement->title ?><i class="bi bi-heart heart-icon" style="margin-left: 20px; font-size: 20px; cursor: pointer;"></i></h3>
                            <p class="card-text text-center"> <?= $logement->address->city ?></p>
                            <p class="card-text text-center">Prix par nuit: <?= $logement->price_per_night ?> €</p>
                            <p class="card-text text-center">Nombre de voyageurs: <?= $logement->nb_traveler ?></p>
                            <button class="btn btn-custom">Supprimer</button>
                            <a href="/reservationByHote/<?php echo $logement->id; ?>" class="btn btn-info" "> Voir réservation</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>
    </div>


    <a href=" /"class="btn btn-custom" style="width: 100px;">Retour</a>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const hearts = document.querySelectorAll('.heart-icon');
                                    hearts.forEach(heart => {
                                        heart.addEventListener('click', function() {
                                            heart.classList.toggle('active');
                                            heart.classList.toggle('bi-heart');
                                            heart.classList.toggle('bi-heart-fill');
                                        });
                                    });
                                });
                            </script>