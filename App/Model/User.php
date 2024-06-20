<?php 

namespace App\Model;

use Core\Model\Model;

class User extends Model
{
   public string $email;
   public string $password;
   public string $lastname;
   public string $firstname;
   public string $phone;
   public bool $is_active;

   public int $adress_id;
   public Address $adress;
}
