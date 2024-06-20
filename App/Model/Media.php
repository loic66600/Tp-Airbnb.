<?php

namespace App\Model;

use Core\Model\Model;

class Media extends Model{
    public string $image_path;
    public string $logement_id;


    public Logement $logement;

    
}