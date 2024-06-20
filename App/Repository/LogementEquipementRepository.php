<?php

namespace App\Repository;

use App\AppRepoManager;
use App\Model\Equipement;
use Core\Repository\Repository;

class LogementEquipementRepository extends Repository
{
  public function getTableName(): string
  {
    return "logementequipement";
  }


  /**
   * methode qui recupere tous les equipements
   * @return array
   * 
   */
  public function getEquipements($id): array
  {
    //on declare un tableau vide
    $array_result = [];
    $q = sprintf(
      '  SELECT e.id, e.label, e.category, e.image_path FROM %1$s as le
      INNER JOIN %2$s  as e ON e.id = le.equipement_id
      WHERE le.logement_id = :id
',
      $this->getTableName(), //correspond au %1$s
      AppRepoManager::getRm()->getEquipementRepository()->getTableName() //correspond au %2$s
    );
    //on prepare la requete
    $stmt = $this->pdo->prepare($q);

    if (!$stmt) return $array_result;

    $stmt->execute(['id' =>$id]);

    while ($data = $stmt->fetch()) {
      $array_result[$data['category']][] = new Equipement($data);
    }
    //on retourne le tableau
    return $array_result ;
  }

  public function insert_equipement(array $data): bool
  {
    $q = sprintf(
      'INSERT INTO `%s`(`logement_id`, `equipement_id`)

      VALUES ( :logement_id, :equipement_id)',

      $this->getTableName()
    );
    //on execute la requête
    $stmt = $this->pdo->prepare($q);

    //on execute la requête
    if (!$stmt->execute($data)) return false;

    //on retourne l id de la nouvelle entrée
    return $stmt->rowCount() >0;
  }

}
