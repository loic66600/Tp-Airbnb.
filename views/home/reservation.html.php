<h1>Mes réservations</h1>
    <table>
        <thead>
            <tr>
                <th>Numéro de commande</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Nombre d'adultes</th>
                <th>Nombre d'enfants</th>
                <th>Prix total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation) : ?>
            <tr>
                <td><?= htmlspecialchars($reservation->order_number) ?></td>
                <td><?= htmlspecialchars($reservation->date_start) ?></td>
                <td><?= htmlspecialchars($reservation->date_end) ?></td>
                <td><?= htmlspecialchars($reservation->nb_adult) ?></td>
                <td><?= htmlspecialchars($reservation->nb_child) ?></td>
                <td><?= htmlspecialchars($reservation->price_total) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>