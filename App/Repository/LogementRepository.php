<?php

namespace App\Repository;

use App\AppRepoManager;
use App\Model\Address;
use App\Model\Logement;
use Core\Repository\Repository;


class LogementRepository extends Repository
{
  public function getTableName(): string
  {
    return "logement";
  }

  /**
   * méthode qui permet de récupérer toutes les pizzas de l'admin
   * @return array
   */
  public function getAllLogement(): array
  {
    //on déclare un tableau vide
    $array_result = [];

    //on crée la requête SQL
    $q = sprintf(
      'SELECT  l.*, m.`image_path`
      FROM %1$s as l
      INNER JOIN %2$s as m ON m.`id` = l.`id`
      WHERE l.`is_active` = 1
      ',
      $this->getTableName(), //correspond au %1$s
      AppRepoManager::getRm()->getMediaRepository()->getTableName() //correspond au %2$s

    );

    //on peut directement executer la requete
    $stmt = $this->pdo->query($q);
    //on vérifie que la requete est bien executée
    if (!$stmt) return $array_result;
    //on récupère les données que l'on met dans notre tableau
    while ($row_data = $stmt->fetch()) {
      //a chaque passage de la boucle on instancie un objet pizza
      $logement = new Logement($row_data);
      $logement->medias[] = $row_data['image_path'];
      $logement->address = AppRepoManager::getRm()->getAddressRepository()->readById(Address::class, $logement->address_id);
      $array_result[] = $logement;
    }
  
    //on retourne le tableau fraichement rempli
    return $array_result;
  }
  public function getOneLogement(int $id)
  {
    //on déclare un tableau vide
    $array_result = [];

    //on crée la requête SQL
    $q = sprintf(
      'SELECT  * from %s 
      WHERE id = :id ',
      $this->getTableName(), //correspond au %1$s
    );

    //on peut directement executer la requete
    $stmt = $this->pdo->prepare($q);

    //on peut directement executer la requete
    if (!$stmt) return null;
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetch();

    //on retourne le tableau fraichement rempli
    if (!$result) return null;

    $logement = new Logement($result);
    $logement->medias = AppRepoManager::getRm()->getMediaRepository()->getAllMedia($logement->id);
    $logement->equipements = AppRepoManager::getRm()->getLogementEquipementRepository()->getEquipements($logement->id);



    return $logement;
  }
  public function getAnnonceById(int $logement_id): ?Logement
  {
    //on crée la requete SQL
    $q = sprintf(
      'SELECT * FROM %s WHERE `id` = :id',
      $this->getTableName()
    );

    //on prépare la requete
    $stmt = $this->pdo->prepare($q);

    //on vérifie que la requete est bien préparée
    if (!$stmt) return null;

    //on execute la requete en passant les paramètres
    $stmt->execute(['id' => $logement_id]);

    //on récupère le résultat
    $result = $stmt->fetch();

    //si je n'ai pas de résultat, je retourne null
    if (!$result) return null;

    //si j'ai un résultat, j'instancie un objet Pizza
    $logement = new Logement($result);


    //je retourne l'objet Pizza
    return $logement;
  }

  public function addLogement( array $data)
  {

    $q = sprintf(
      'INSERT INTO %s
      (`title`, `description`, `price_per_night`, `address_id`, `is_active`)
      VALUES
      (:title, :description, :price_per_night, :address_id, :is_active)',
      $this->getTableName()
    );
    $stmt = $this->pdo->prepare($q);
    // TO DO: CONTINUER

  }

/**
 * methode qui inser tous les information d'un logement
 */
  public function insert_logement(array $data): ?int
  {
    $q = sprintf(
      'INSERT INTO `%s`( `title`, `description`, `price_per_night`, `is_active`, `nb_room`, `nb_bed`, `nb_bath`, `nb_traveler`,`type_id`, `address_id`, `user_id`)

      VALUES ( :title, :description, :price_per_night, :is_active, :nb_room, :nb_bed, :nb_bath, :nb_traveler, :type_id, :address_id, :user_id)',

      $this->getTableName()
    );
    //on execute la requête
    $stmt = $this->pdo->prepare($q);

    //on execute la requête
    if (!$stmt->execute($data)) return null;

    //on retourne l id de la nouvelle entrée
    return $this->pdo->lastInsertId();
  }

}
