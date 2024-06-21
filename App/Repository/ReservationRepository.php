<?php

namespace App\Repository;


use App\AppRepoManager;
use App\Model\Reservation;
use Core\Repository\Repository;

class ReservationRepository extends Repository
{
  public function getTableName(): string
  {
    return 'reservation';
  }

  public function getAllReservation(): array
  {
    //on déclare un tableau vide
    $array_result = [];
    $q = sprintf(
      'SELECT * 
      FROM reservation',

      $this->getTableName(),
    );
    //on execute la requête
    $results = $this->pdo->query($q);

    if (!$results) return $array_result;

    //on boucle sur les resultats
    while ($row_data = $results->fetch()) {
      $array_result[] = new Reservation($row_data);
    }
    //on retourne le tableau
    return $array_result;
  }
  /**
   * methode qui recupere une reservation
   * @param array $data
   * @return ?int
   * 
   */
  public function getReservationById(array $data): ?int
  {
    $q = sprintf(
      'INSERT INTO `%s`(`order_number`,`date_start`,`date_end`,`nb_adult`,`nb_child`,`price_total`,`user_id`,`logement_id`)

      VALUES ( :order_number, :date_start, :date_end, :nb_adult, :nb_child, :price_total,:user_id, :logement_id)',

      $this->getTableName()
    );
    //on execute la requête
    $stmt = $this->pdo->prepare($q);

    //on execute la requête
    if (!$stmt->execute($data)) return null;

    //on retourne l id de la nouvelle entrée
    return $this->pdo->lastInsertId();
  }

  public function getReservation(int $id): array
  {
    //on déclare un tableau vide
    $array_result = [];
    $q = sprintf(
      'SELECT * 
      FROM `%s`
      WHERE `user_id` = :id',
      $this->getTableName()
    );
    //on execute la requête
    $stmt = $this->pdo->prepare($q);

    if (!$stmt) return $array_result;

    $stmt->execute(['id' => $id]);

    //on boucle sur les resultats
    while ($row_data = $stmt->fetch()) {
      $reservation = new Reservation($row_data);
      $reservation->logement = AppRepoManager::getRm()->getLogementRepository()->getOneLogement($reservation->logement_id);
      $array_result[] = $reservation;
    }
    //on retourne le tableau
    return $array_result;
  }

  public function deleteReservation(int $id): bool
  {
    $q = sprintf(
      'DELETE FROM `%s`
      WHERE `id` = :id',
      $this->getTableName()
    );
    //on execute la requête
    $stmt = $this->pdo->prepare($q);

    //on execute la requête
    if (!$stmt) return false;

    //on retourne l id de la nouvelle entrée
    return $stmt->execute(['id' => $id]);
  }

  public function findLastOrder():?int
  {
    $query = sprintf(
      'SELECT * 
        FROM `%s` 
        ORDER BY id DESC 
        LIMIT 1',
      $this->getTableName()
    );
    $stmt = $this->pdo->query($query);

    //on vérifie si s'est bien bien executer
    if (!$stmt) return null;

    // on retourne l'id de la commande
    $result = $stmt->fetchObject();

    return $result->id ?? 0;
  }
  public function getReservationByHote(int $id): array
  {
    //on déclare un tableau vide
    $array_result = [];
    $q = sprintf(
      'SELECT * 
      FROM `%s`
      WHERE `logement_id` = :id',
      $this->getTableName()
    );
   
    //on execute la requête
    $stmt = $this->pdo->prepare($q);

    if (!$stmt) return $array_result;

    $stmt->execute(['id' => $id]);

    //on boucle sur les resultats
    while ($row_data = $stmt->fetch()) {
      $reservationsHotes = new Reservation($row_data);
      $reservationsHotes->logement = AppRepoManager::getRm()->getLogementRepository()->getOneLogement($reservationsHotes->logement_id);
      $array_result[] = $reservationsHotes;
    }
    //on retourne le tableau
    return $array_result;
  }


}
