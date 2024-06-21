<?php

namespace App;

use App\Controller\AuthController;
use App\Controller\HomeController;
use App\Controller\LogementController;
use Core\Database\DatabaseConfigInterface;
use MiladRahimi\PhpRouter\Exceptions\InvalidCallableException;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use MiladRahimi\PhpRouter\Router;

class App implements DatabaseConfigInterface
{

  private static ?self $instance = null;
  //on crée une méthode public appelé au demarrage de l'appli dans index.php
  public static function getApp(): self
  {
    if (is_null(self::$instance)) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  //on crée une propriété privée pour stocker le routeur
  private Router $router;
  //méthode qui récupère les infos du routeur
  public function getRouter()
  {
    return $this->router;
  }

  private function __construct()
  {
    //on crée une instance de Router
    $this->router = Router::create();
  }

  //on a 3 méthodes a définir 
  // 1. méthode start pour activer le router
  public function start(): void
  {
    //on ouvre l'accès aux sessions
    session_start();
    //enregistrements des routes
    $this->registerRoutes();
    //démarrage du router
    $this->startRouter();
  }

  //2. méthode qui enregistre les routes
  private function registerRoutes(): void
  {
    //ON ENREGISTRE LES ROUTES ICI
    $this->router->get('/', [HomeController::class, 'home']);
    //INFO: si on veut renvoyer une vue à l'utilisateur => route en "get"
    //INFO: si on veut traiter des données d'un
    //ON ENREGISTRE LES ROUTES ICI
    $this->router->get('/', [HomeController::class, 'home']);
    //INFO: si on veut renvoyer une vue à l'utilisateur => route en "get"
    //INFO: si on veut traiter des données d'unrmulaire => route en "post"


    // PARTIE AUTH:

    $this->router->get('/connexion', [AuthController::class, 'loginForm']);
    $this->router->get('/logout', [AuthController::class, 'logout']);
    $this->router->post('/login', [AuthController::class, 'login']);
    $this->router->get('/inscription', [AuthController::class, 'registerForm']);
    $this->router->post('/register', [AuthController::class, 'register']);

    // CONNEXION
    $this->router->get('/detail/{id}', [HomeController::class, 'index']);
    $this->router->post('/reservation/{id}', [LogementController::class, 'reservation']);

    $this->router->get('/result_reservation/{id}', [LogementController::class, 'result_reservation']);
    $this->router->get('/reservationByHote/{id}', [LogementController::class, 'result_reservationHote']);

    $this->router->get('/add_logement', [LogementController::class, 'insertLogement']);
    $this->router ->post('/insertLogementForm', [LogementController::class, 'insertLogementForm']);
    $this->router ->get('/insertLogementForm/{user_id}', [LogementController::class, 'vuelogement']);
    $this->router ->get('/reservation/delete/{id}', [LogementController::class, 'deleteReservation']);
    $this->router ->get('/logement/delete/{id}', [LogementController::class, 'deleteLogement']);

    
  }

  //3. méthode qui démarre le router
  private function startRouter(): void
  {
    try {
      $this->router->dispatch();
    } catch (RouteNotFoundException $e) {
      echo $e;
    } catch (InvalidCallableException $e) {
      echo $e;
    }
  }






  public function getHost(): string
  {
    return DB_HOST;
  }

  public function getName(): string
  {
    return DB_NAME;
  }

  public function getUser(): string
  {
    return DB_USER;
  }

  public function getPass(): string
  {
    return DB_PASS;
  }
}
