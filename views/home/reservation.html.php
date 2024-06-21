<h1>Mes réservations</h1>
    <table>
        <thead>
            <tr>
                <th>Numéro de commande</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>lieu</th>
                <th>Nombre d'adultes</th>
                <th>Nombre d'enfants</th>
                <th>Prix total</th>
                <th>supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation) : ?>
                
            <tr>
                <td><?= htmlspecialchars($reservation->order_number) ?></td>
                <td><?= htmlspecialchars($reservation->date_start) ?></td>
                <td><?= htmlspecialchars($reservation->date_end) ?></td>
                <td><?= htmlspecialchars($reservation->logement->address->city)?></td>
                <td><?= htmlspecialchars($reservation->nb_adult) ?></td>
                <td><?= htmlspecialchars($reservation->nb_child) ?></td>
                <td><?= htmlspecialchars($reservation->price_total) ?></td>
                <td><a href="/reservation/delete/<?= $reservation->id ?>"><i><i class="bi bi-trash" style="color: red;"></i></i></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <div class="card-body mt-3 text-center ">
    <a href="/"class="btn btn-custom" style="width: 100px;" >Retour</a>
</div>