<?php

namespace App\Repository;


use App\Model\Media;
use Core\Repository\Repository;

/**
 * Class MediaRepository
 * 
 */
class MediaRepository extends Repository
{
  public function getTableName(): string
  {
    return "media";
  }

  /**
   * Fonction qui permet de recuperer tous les medias d'un logement
   * @param int $logement_id
   * @return array
   */
  public function  getAllMedia(int $id): array
  {
    $q = sprintf(
      'SELECT *
     FROM %s
      WHERE logement_id = :id',
      $this->getTableName()
    );

    //on prepare un tableau vide
    $array_result = [];
    //on peut directement executer la requete
    $stmt = $this->pdo->prepare($q);
  $stmt->execute(['id' => $id]);
    //on peut directement executer la requete
    if (!$stmt) return null;
  //on boucle sur les resultats
  while ($row_data = $stmt->fetch()) {
    $array_result[] = new Media($row_data);
  }
  return $array_result;
  }
  
  public function insert_media(array $data): bool
  {
    $q = sprintf(
      'INSERT INTO `%s`( `image_path`, `logement_id`) 

      VALUES ( :image_path, :logement_id)',

      $this->getTableName()
    );
    //on execute la requête
    $stmt = $this->pdo->prepare($q);

    //on execute la requête
    if (!$stmt) return false;

    //on retourne l id de la nouvelle entrée
    return $stmt->execute($data);
  }



}
