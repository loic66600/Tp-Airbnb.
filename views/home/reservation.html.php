 <h1 class="title">Mes réservations</h1>
    <div class="card-container">
        <?php foreach ($reservations as $reservation) : ?>
            <div class="card">
                <div class="card-item"><strong>Numéro de commande:</strong> <?= htmlspecialchars($reservation->order_number) ?></div>
                <div class="card-item"><strong>Date de début:</strong> <?= htmlspecialchars($reservation->date_start) ?></div>
                <div class="card-item"><strong>Date de fin:</strong> <?= htmlspecialchars($reservation->date_end) ?></div>
                <div class="card-item"><strong>Lieu:</strong> <?= htmlspecialchars($reservation->logement->address->city) ?></div>
                <div class="card-item"><strong>Nombre d'adultes:</strong> <?= htmlspecialchars($reservation->nb_adult) ?></div>
                <div class="card-item"><strong>Nombre d'enfants:</strong> <?= htmlspecialchars($reservation->nb_child) ?></div>
                <div class="card-item"><strong>Prix total:</strong> <?= htmlspecialchars($reservation->price_total) ?> €</div>
                <div class="card-footer">
                    <a href="/reservation/delete/<?= $reservation->id ?>"><i class="bi bi-trash" style="color: red;"></i> Supprimer</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="card-body mt-3 text-center">
        <a href="/" class="btn btn-custom" style="width: 100px;">Retour</a>
    </div>