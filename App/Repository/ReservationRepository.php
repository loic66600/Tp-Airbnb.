<?php

namespace App\Repository;


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

      $array_result[] = $reservation;
    }
    //on retourne le tableau
    return $array_result;
  }
}
