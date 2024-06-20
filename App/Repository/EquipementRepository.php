<?php

namespace App\Repository;

use App\Model\Equipement;
use Core\Repository\Repository;

class EquipementRepository extends Repository
{
  public function getTableName(): string
  {
    return 'equipement';
  }

  public function getAllEquipements(): array
  {
    $array_result = [];
    $q = sprintf(
      'SELECT * FROM %s',
      $this->getTableName()
    );

    $stmt = $this->pdo->query($q);
    if (!$stmt) return $array_result;
    while ($result = $stmt->fetch()) {
      $array_result[] = new Equipement($result);
    }
    return $array_result;
  }


}
