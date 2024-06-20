<?php

namespace App;


use App\Repository\TypeRepository;
use App\Repository\UserRepository;
use App\Repository\MediaRepository;
use App\Repository\AddressRepository;
use App\Repository\LogementRepository;
use App\Repository\EquipementRepository;
use App\Repository\ReservationRepository;
use Core\Repository\RepositoryManagerTrait;
use App\Repository\LogementEquipementRepository;

class AppRepoManager
{
  //on récupère le trait RepositoryManagerTrait
  use RepositoryManagerTrait;

  //on déclare une propriété privée qui va contenir une instance du repository
// exemple: private Repository $Repository;
private UserRepository $userRepository;
private TypeRepository $typeRepository;
private ReservationRepository $reservationRepository;
private MediaRepository $mediaRepository;
private LogementEquipementRepository $logementEquipementRepository;
private LogementRepository $logementRepository;
private EquipementRepository $equipementRepository;
private AddressRepository $addressRepository;

  //on crée ensuite les getter pour accéder à la propriété privée
  //exemple: public function getRepository(): Repository
  //{
  //  return $this->Repository;
  //}

  public function getUserRepository(): UserRepository
  {
    return $this->userRepository;
  }

  public function getTypeRepository(): TypeRepository
  {
    return $this->typeRepository;
  }

  public function getReservationRepository(): ReservationRepository
  {
    return $this->reservationRepository;
  }

  public function getMediaRepository(): MediaRepository
  {
    return $this->mediaRepository;
  } 

  public function getLogementEquipementRepository(): LogementEquipementRepository
  {
    return $this->logementEquipementRepository;
  }

  public function getLogementRepository(): LogementRepository
  {
    return $this->logementRepository;
  }

  public function getEquipementRepository(): EquipementRepository
  {
    return $this->equipementRepository;
  }

  public function getAddressRepository(): AddressRepository
  {
    return $this->addressRepository;
  }


  //enfin, on declare un construct qui va instancier les repositories
  protected function __construct()
  {
    $config = App::getApp();
    //on instancie le repository
    //exemple: $this->Repository = new Repository($config);

    $this->userRepository = new UserRepository($config);
    $this->typeRepository = new TypeRepository($config);
    $this->reservationRepository = new ReservationRepository($config);
    $this->mediaRepository = new MediaRepository($config);
    $this->logementEquipementRepository = new LogementEquipementRepository($config);
    $this->logementRepository = new LogementRepository($config);
    $this->equipementRepository = new EquipementRepository($config);
    $this->addressRepository = new AddressRepository($config);
  }
}
