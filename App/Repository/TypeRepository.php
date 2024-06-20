<?php

namespace App\Repository;

use Core\Repository\Repository;


class TypeRepository extends Repository
{
    public function getTableName(): string
    {
        return 'type';
    }
}