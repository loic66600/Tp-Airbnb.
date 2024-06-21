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
       <nav class="navbar navbar-expand-lg navbar-light ">
         <div class="container-fluid">
           <a class="navbar-brand" href="#">Rechercher</a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                 <a class="nav-link active" aria-current="page" href="#">ville</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="#">Categorie</a>
               </li>
             </ul>
             <form class="d-flex">
               <button class="btn btn-outline-success" type="submit"> <i class="bi bi-search " style="color: white"></i></button>
             </form>
           </div>
         </div>
   </div>
   <!-- menu du profil -->




   <?php if ($auth::isAuth()) : ?>

     <span class="compte">
       <p>Bonjour <?= Session::get(Session::USER)->firstname ?> </p>

       <div class="dropdown custom-link">

         <a class="dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
           <button type="button" class="btn btn-outline-secondary rounded-pill">Mon compte <i class="bi bi-person-circle custom-svg"></i></button>
         </a>
     </span>

     <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">




       <li><a class="dropdown-item custom-link" href="/add_logement">Mettre mon logement sur Airbnb</a></li>

       <li><a class="dropdown-item custom-link" href="/insertLogementForm/<?= $user_id ?>">Mes logements</a></li>

       <li><a class="dropdown-item custom-link" href="/result_reservation/<?= $user_id ?>">Mes réservation</a></li>

       <li>
         <hr class="dropdown-divider">
       </li>
       <li><a class="dropdown-item custom-link" href="/logout">Se déconnecter</a></li>
     <?php else : ?>

       <span class="compte">
         <li><a class=" btn btn-outline-secondary rounded-pill" href="/connexion"> Se Connecter</a></li>
         <li><a class=" btn btn-outline-secondary rounded-pill" href="/inscription">Inscription</a></li>
       </span>
     <?php endif ?>
     </ul>

 </div>
 </li>
 </div>
 <hr>