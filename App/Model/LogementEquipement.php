<?php

namespace App\Model;

use Core\Model\Model;
use App\Model\Logement;
use App\Model\Equipement;



class LogementEquipement extends Model
{
  public int $equipement_id;
  public int $logement_id;

  public Equipement $equipement;
  public Logement $logement;
}