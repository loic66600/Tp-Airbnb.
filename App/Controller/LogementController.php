<?php


namespace App\Controller;

use DateTime;
use Core\View\View;
use App\Model\Address;
use App\AppRepoManager;
use App\Model\Equipement;
use App\Model\Logement;
use Core\Form\FormError;
use Core\Form\FormResult;
use Core\Session\Session;
use Core\Form\FormSuccess;
use Core\Controller\Controller;
use Laminas\Diactoros\ServerRequest;

class LogementController extends Controller
{

    private function checkAdminAuthentication(): void
    {
        if (!AuthController::isAuth() || !AuthController::isAuth()) {
            $this->redirect('/');
        }
    }


    public function reservation(ServerRequest $request)
    {
        $data_form = $request->getParsedBody();


        $form_result = new FormResult();
        $logement = new Logement();
        $nombre_jours = date_diff(new DateTime($data_form['date_start']), new DateTime($data_form['date_end']))->days;


        if (empty($data_form['date_start']) || empty($data_form['date_end']) || empty($data_form['nb_adult']) || empty($data_form['nb_child']) || empty($data_form['logement_id'])) {
            $form_result->addError(new FormError('Veuillez remplir tous les champs6'));
        }

        $order_number = $this->generateOrderNumber();
        $date_start = date('Y-m-d', strtotime($data_form['date_start']));
        $date_end = date('Y-m-d', strtotime($data_form['date_end']));
        $nb_adult = $data_form['nb_adult'];
        $nb_child = $data_form['nb_child'];
        $logement_id = $data_form['logement_id'];
        $user_id = Session::get(Session::USER)->id;
        $price_total = $nombre_jours * $data_form['price_per_night'];


        $data_order = [
            'order_number' => $order_number,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'nb_adult' => intval($nb_adult),
            'nb_child' => intval($nb_child),
            'user_id' => intval($user_id),
            'logement_id' => intval($logement_id),
            'price_total' => intval($price_total),
        ];


        $reservation = AppRepoManager::getRm()->getReservationRepository()->getReservationById($data_order);
        // var_dump($reservation);
        if (!$reservation) {
            $form_result->addError(new FormError('Une reservation est deja en cours'));
        } else {
            $form_result->addSuccess(new FormSuccess('Reservation effectuee'));
        }


        if ($form_result->hasErrors()) {
            Session::set(Session::FORM_RESULT, $form_result);
            self::redirect('/detail/' . $data_form['logement_id']);
        }
        if ($form_result->getSuccessMessage()) {
            Session::remove(Session::FORM_RESULT);
            Session::set(Session::FORM_SUCCESS, $form_result);
            //on redirige sur la page detail de la pizza
            self::redirect('/detail/' . $data_form['logement_id']);
        }
    }

    private function generateOrderNumber()
    {
        //je veux un numero de commande du type: FACT2406_00001 par exemple
        $order_number = 1;
        $order = AppRepoManager::getRm()->getLogementRepository()->getOneLogement($order_number);
        //   $order_number = str_pad($order + 1, 5, '0', STR_PAD_LEFT);
        $year = date('y');
        $month = date('m');

        $final = "FACT{$year}{$month}_{$order_number}";
        return $final;
    }

    public function result_reservation($id)
    {
        $view_data = [

            'reservations' => AppRepoManager::getRm()->getReservationRepository()->getReservation($id),
            'form_result' => Session::get(Session::FORM_RESULT),
            'form_success' => Session::get(Session::FORM_SUCCESS),

        ];
        $view = new View('home/reservation');

        $view->render($view_data);
    }

    /**
     * methode pour inserer des logement
     * @return void
     * 
     */
    public function insertLogement()
    {
        $view_data = [
            'form_result' => Session::get(Session::FORM_RESULT),
            'form_success' => Session::get(Session::FORM_SUCCESS),
        ];
        $view = new View('home/add_logement');

        $view->render($view_data);
    }


    public function insertLogementForm(ServerRequest $request)
    {
        $data_form = $request->getParsedBody();
        $form_result = new FormResult();
        // var_dump($data_form);die;

        $title = $data_form['title'];
        $description = $data_form['description'];
        $price_per_night = $data_form['price_per_night'];
        $nb_room = $data_form['nb_room'];
        $nb_bed = $data_form['nb_bed'];
        $nb_traveler = $data_form['nb_traveler'];
        $type_id = $data_form['type_id'];
        $nb_bath = $data_form['nb_bath'];
        $user_id = Session::get(Session::USER)->id;
        $equipements = $data_form['equipements'];
        $adress = $data_form['adress'];
        $zip_code = $data_form['zip_code'];
        $city = $data_form['city'];
        $country = $data_form['country'];
        $phone = $data_form['phone'];
        $file_data = $_FILES['image_path'];

        $image_name = $file_data['name'] ?? '';
        $tmp_path = $file_data['tmp_name'] ?? '';
        $public_path = 'public/assets/image/';

        //on vérifie que les champs sont bien rempli sinon on stock une erreur dans le form_result
        if (!in_array($file_data['type'] ?? '', ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])) {
            $form_result->addError(new FormError('Le format de l\'image n\'est pas valide'));
        } elseif (
            empty($adress) ||
            empty($city) ||
            empty($zip_code) ||
            empty($country) ||
            empty($phone) ||
            empty($title) ||
            empty($description) ||
            empty($price_per_night) ||
            empty($nb_room) ||
            empty($nb_bed) ||
            empty($nb_bath) ||
            empty($nb_traveler) ||
            empty($type_id) ||
            empty($user_id)
        ) {

            $form_result->addError(new FormError('Veuillez remplir tous les champs'));
        } else {
            $filename = uniqid() . '_' . $image_name;
            $slug = explode('.', strtolower(str_replace(' ', '-', $filename)))[0];
            $imgPathPublic = PATH_ROOT . $public_path . $filename;
            // construire un tableaau pour inserer une adresse
            $data_address = [
                'address' => $adress,
                'zip_code' => $zip_code,
                'city' => $city,
                'country' => $country,
                'phone' => $phone
            ];

            if (move_uploaded_file($tmp_path, $imgPathPublic)) {
                //on insere l'adresse et on recupère l'id qui a été crée
                $address_id = AppRepoManager::getRm()->getAddressRepository()->insert_address($data_address);
                // var_dump($address_id);
                if (!$address_id) {
                    $form_result->addError(new FormError('Une erreur est survenue lors de l\'insertion de l\'adresse'));
                }

                $data_logement = [
                    'title' => $title,
                    'description' => $description,
                    'price_per_night' => $price_per_night,
                    'nb_room' => $nb_room,
                    'nb_bed' => $nb_bed,
                    'nb_bath' => $nb_bath,
                    'nb_traveler' => $nb_traveler,
                    'type_id' => $type_id,
                    'user_id' => $user_id,
                    'is_active' => 1,
                    'address_id' => $address_id
                ];
                $logement_id = AppRepoManager::getRm()->getLogementRepository()->insert_logement($data_logement);
                // var_dump($logement_id);
                if (!$logement_id) {
                    $form_result->addError(new FormError('Une erreur est survenue lors de l\'insertion du logement'));
                }
                // on construit un tableau  pour inseré les logementequipements

                foreach ($equipements as $equipement) {
                    //on reconstrui un tableau de donnees pour les ingredients
                    $data_logement_equipement = [
                        'logement_id' => $logement_id,
                        'equipement_id' => $equipement

                    ];
                    $equipement  = AppRepoManager::getRm()->getLogementEquipementRepository()->insert_equipement($data_logement_equipement);
                    // var_dump($equipement);
                    if (!$equipement) {
                        $form_result->addError(new FormError('Une erreur est survenue lors de l\'insertion de l\'equipement'));
                    } else {
                        $form_result->addSuccess(new FormSuccess('Votre logement a bien été ajouté'));
                    }
                }
                $media_data = [
                    'image_path' => htmlspecialchars(trim($filename)),
                    'logement_id' => $logement_id
                ];
                $media_data = AppRepoManager::getRm()->getMediaRepository()->insert_Media($media_data);
                if (!$media_data) {
                    $form_result->addError(new FormError('erreur insert image'));
                } else {
                    $form_result->addSuccess(new FormSuccess('ajout reussi'));
                }
            }
        }

        if ($form_result->hasErrors()) {
            Session::set(Session::FORM_RESULT, $form_result);
            self::redirect('/add_logement');
        }
        if ($form_result->hasSuccess()) {
            Session::remove(Session::FORM_RESULT);
            Session::set(Session::FORM_SUCCESS, $form_result);
            //on redirige sur la page detail de la pizza
            self::redirect('/');
        }
    }

    public function vuelogement($user_id)
    {
        $View = new View('home/insertLogementForm');

        $view_data = [
            'vuelogement' => AppRepoManager::getRm()->getLogementRepository()->getLogementByUser($user_id),
            'form_result' => Session::get(Session::FORM_RESULT),
            'form_success' => Session::get(Session::FORM_SUCCESS),
        ];

        $View->render($view_data);
    }


    public function deleteReservation($id)
    {
      $form_result = new FormResult();

      //appele de la methode qui desative une reservation
      $deletLogement = AppRepoManager::getRm()->getReservationRepository()->deleteReservation($id);

      if (!$deletLogement) {
        $form_result->addError(new FormError('Une erreur est survenue lors de la suppression de la reservation'));
      } else {
        $form_result->addSuccess(new FormSuccess('La reservation a bien été supprimé'));
      }

      if ($form_result->hasErrors()) {
        Session::set(Session::FORM_RESULT, $form_result);
        self::redirect('/result_reservation');
      }
      if ($form_result->hasSuccess()) {
        Session::remove(Session::FORM_RESULT);
        Session::set(Session::FORM_SUCCESS, $form_result);
        //on redirige sur la page detail de la pizza
        self::redirect('/');
      }

    
    }

    public function deleteLogement($id)
    {
      $form_result = new FormResult();

      //appele de la methode qui desative une reservation
      $deletLogement = AppRepoManager::getRm()->getLogementRepository()->deleteLogement($id);

      if (!$deletLogement) {
        $form_result->addError(new FormError('Une erreur est survenue lors de la suppression du logement'));
      } else {
        $form_result->addSuccess(new FormSuccess('Le logement a bien été supprimé'));
      }

      if ($form_result->hasErrors()) {
        Session::set(Session::FORM_RESULT, $form_result);
        self::redirect('/result_reservation');
      }
      if ($form_result->hasSuccess()) {
        Session::remove(Session::FORM_RESULT);
        Session::set(Session::FORM_SUCCESS, $form_result);
        //on redirige sur la page detail de la pizza
        self::redirect('/');
      }

    
    }


}
