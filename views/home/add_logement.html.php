<?php

use App\Model\Type;
use App\AppRepoManager;
use Core\Session\Session;

 ?>
<h1 class="title">Ajouter un logement</h1>

<div class="container ">
    <form class="add-logement-form" action="/insertLogementForm" enctype="multipart/form-data" method="POST">

        <div class="form-container">

            <div class="box-auth-input">
                <label class="detail-description">Adresse</label>
                <input type="text" class="form-control" name="adress">
            </div>
            <div class="box-auth-input">
                <label class="detail-description">Ville</label>
                <input type="text" class="form-control" name="city">
            </div>
            <div class="box-auth-input">
                <label class="detail-description">Code postal</label>
                <input type="text" class="form-control" name="zip_code">
            </div>
            <div class="box-auth-input">
                <label class="detail-description">Pays</label>
                <input type="text" class="form-control" name="country">
            </div>
            <div class="box-auth-input">
                <label class="detail-description">Téléphone</label>
                <input type="text" class="form-control" name="phone">
            </div>
        </div>

        <div class="form-container">
            <div class="box-auth-input">
                <label class="detail-description">Nom du logement</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="box-auth-input">
                <label class="detail-description">Description</label>
                <input type="text" class="form-control" name="description">
            </div>
            <div class="box-auth-input">
                <label class="detail-description">Prix par nuits</label>
                <input type="number" min="0" class="form-control" name="price_per_night">
            </div>
            <br>
            <div class="form-container">
                <div class="box-auth-input ">
                    <label class="detail-description">Type de logement</label>
                    <div style="gap:10px;">
                  <?php foreach (AppRepoManager::getRm()->getTypeRepository()->readAll(Type::class) as $type) : ?>
                        <input type="checkbox" name="type_id" value="<?= $type->id ?>">
                    <label for="type"><?= $type->label ?></label>
                <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
<br>
        <div class=" box-auth-input">
            <label class="detail-description">Nombre de chambres</label>
            <input type="number" min="0" class="form-control" name="nb_room">
        </div>
        <div class=" box-auth-input">
            <label class="detail-description">Nombre de lits</label>
            <input type="number" min="0" class="form-control" name="nb_bed">
        </div>
        <div class="box-auth-input">
            <label class="detail-description">Nombre de salle de bain</label>
            <input type="number" min="0" class="form-control" name="nb_bath">
        </div>
        <div class="box-auth-input">
            <label class="detail-description">Nombre maximal de voyageurs</label>
            <input type="number" min="0" class="form-control" name="nb_traveler">
        </div>
        <BR>    
        <div class="form-container">
            <label class="detail-description">Equipements disponible</label>
            <div class="box-auth-input">
                <!-- je recupere tous les equipemenr dans une boucle -->
                <?php foreach (AppRepoManager::getRm()->getEquipementRepository()->getAllEquipements() as $equipement) : ?>
                    <input type="checkbox" name="equipements[]" value="<?= $equipement->id ?>">
                    <label for="type"><?= $equipement->label ?></label>
                <?php endforeach; ?>
            </div>
            <BR>
            <div>
                <label for="image">Photo de la maison</label>
                <input type="file" name="image_path">
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
        
        <button type="submit" class="call-action btn btn-primary mt-4">Ajouter logement</button>
        <a href="/" class="btn btn-primary mt-4">Annuler</a>
    </form>
</div>