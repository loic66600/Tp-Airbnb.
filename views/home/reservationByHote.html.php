<h1 class="title">Mes locations réservées</h1>
    <div class="card-container">
        <?php foreach ($reservationsHotes as $reservationsHote) : ?>
            <div class="card">
                <div class="card-item"><strong>Numéro de commande:</strong> <?= htmlspecialchars($reservationsHote->order_number) ?></div>
                <div class="card-item"><strong>Date de début:</strong> <?= htmlspecialchars($reservationsHote->date_start) ?></div>
                <div class="card-item"><strong>Date de fin:</strong> <?= htmlspecialchars($reservationsHote->date_end) ?></div>
                <div class="card-item"><strong>Lieu:</strong> <?= htmlspecialchars($reservationsHote->logement->address->city) ?></div>
                <div class="card-item"><strong>Nombre d'adultes:</strong> <?= htmlspecialchars($reservationsHote->nb_adult) ?></div>
                <div class="card-item"><strong>Nombre d'enfants:</strong> <?= htmlspecialchars($reservationsHote->nb_child) ?></div>
                <div class="card-item"><strong>Prix total:</strong> <?= htmlspecialchars($reservationsHote->price_total) ?> €</div>
                <div class="card-footer">
                    <a href="/reservation/delete/<?= $reservationsHote->id ?>"><i class="bi bi-trash" style="color: red;"></i>Supprimer</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="card-body mt-3 text-center">
        <a href="/" class="btn btn-custom" style="width: 100px;">Retour</a>
    </div>