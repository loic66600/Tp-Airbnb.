<?php

namespace App\Repository;

use App\Model\Type;
use Core\Repository\Repository;


class TypeRepository extends Repository
{
    public function getTableName(): string
    {
        return 'type';
    }

    public function getTypeByLogement($logement_id): ?object
    {
        $q = sprintf('SELECT * 
        FROM `%s`
        WHERE id = :id',
        $this->getTableName());

        $stmt = $this->pdo->prepare($q);

        if(!$stmt) return null;

        $stmt->execute(['id' => $logement_id]);

        $result = $stmt->fetch();
        
        return new Type($result);
    }



}