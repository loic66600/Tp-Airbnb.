<?php

namespace App\Repository;

use App\Model\Address;
use Core\Repository\Repository;

class AddressRepository extends Repository
{
  public function getTableName() : string
  {
    return "address";
  }

  public function insert_address(array $data): ?int
  {
    $q = sprintf(
      'INSERT INTO `%s`(`address`, `city`, `zip_code`, `country`, `phone`)

      VALUES ( :address, :city, :zip_code, :country, :phone)',

      $this->getTableName()
    );
    //on execute la requête
    $stmt = $this->pdo->prepare($q);

    //on execute la requête
    if (!$stmt->execute($data)) return null;

    //on retourne l id de la nouvelle entrée
    return $this->pdo->lastInsertId();
  }

  public function getAlladdress(int $id): ?object
    {   
        $q = sprintf('SELECT * FROM `%s` WHERE `id` = :address_id',
        $this->getTableName());
 
        $stmt = $this->pdo->prepare($q);
        $stmt->execute(['address_id' => $id]);
        if(!$stmt) return null;
        
        $result = $stmt->fetch();
        return new Address($result);
 
    }

}