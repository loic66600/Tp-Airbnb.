<?php 

namespace App\Model;


use App\Model\Type;
use App\Model\User;
use Core\Model\Model;
use App\Model\Address;


class Logement extends Model
{
   public string $title;
   public string $description;
   public int $price_per_night;
   public int $nb_room;
   public int $nb_bed;
   public int $nb_bath;
   public int $nb_traveler;
   public bool $is_active;
   public int $type_id;
   public int $address_id;
   public int $user_id;

   public Type $type;
   public Address $address;
   public User $user;

   public array $medias;
   public array $equipements;
   public array $reservations;

}