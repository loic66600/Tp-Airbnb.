<?php 

namespace App\Controller;

use Core\View\View;
use App\AppRepoManager;
use Core\Session\Session;
use Core\Controller\Controller;

class HomeController extends Controller 
{
  public function home()
  {
    $view_data = [
      'logements' => AppRepoManager::getRm()->getLogementRepository()->getAllLogement(),
      'form_result' => Session::get(Session::FORM_RESULT),
      'form_success' => Session::get(Session::FORM_SUCCESS),
    ];
    $view = new View('home/index');

    $view->render($view_data);
  }

  public function index($id)
  {
    $view_data = [
      'logements' => AppRepoManager::getRm()->getLogementRepository()->getOneLogement($id),
      'form_result' => Session::get(Session::FORM_RESULT),
      'form_success' => Session::get(Session::FORM_SUCCESS),
    ];
    $view = new View('home/detail');

    $view->render($view_data);


  }


}