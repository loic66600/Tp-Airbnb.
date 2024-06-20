 <?php
  use Core\Session\Session;
  if ($auth::isAuth()) $user_id = Session::get(Session::USER)->id; 
  ?>
  
 <div class="d-flex justify-content-between align-items-center">
   <!-- logo -->
   <div class="nav-logo">
     <a href="/">
       <img class="header-logo" classes="logo" src="/assets/image/logo.png" alt="logo appli">
     </a>
   </div>

   <!--  barre de navigation -->
   <div class="nav-menu ">
     <nav>
       <div class="search-bar">
         <a href="/destination" class="destination">Rechercher une destination </a>

         <a href="/arrivee" class="arrival">Arrivée</a>

         <a href="/depart" class="departure">Départ</a>

         <a href="/voyageurs" class="travelers"> Voyageurs </a>
         <button class="search-button">
           <i class="bi bi-search " style="color: white"></i>
         </button>

       </div>
     </nav>
   </div>
   <!-- menu du profil -->
   <div class="dropdown custom-link">

     <a class="dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
       <button type="button" class="btn btn-outline-secondary rounded-pill">Mon compte <i class="bi bi-person-circle custom-svg"></i></button>

     </a>

     <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
       <li><a class="dropdown-item custom-link" href="/inscription">Inscription</a></li>
       <li><a class="dropdown-item custom-link" href="/connexion">Connexion</a></li>
       <li>
         <hr class="dropdown-divider">
       </li>
       <li><a class="dropdown-item custom-link" href="/add_logement">Mettre mon logement sur Airbnb</a></li>

       <li><a class="dropdown-item custom-link" href="/result_reservation/<?= $user_id ?>">Mes logements</a></li>
       <?php if ($auth::isAuth()) : ?>
       <li><a class="dropdown-item custom-link" href="/result_reservation/<?= $user_id ?>">Mes reservation</a></li>
       <?php endif ?>
       <li>
         <hr class="dropdown-divider">
       </li>
       <li><a class="dropdown-item custom-link" href="/logout">Se déconnecter</a></li>
     </ul>
   </div>
   </li>
 </div>
 <div class="separation"></div>