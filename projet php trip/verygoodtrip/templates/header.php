<?php
//include('..\config.php');
session_start();
$isUserConnected=false;
$isUserAdmin=false; // accés à la session
  if (isset($_SESSION['user'])) {
  $isUserConnected =true; //: utilisateur connecter
  if($_SESSION['user']['role']=='admin'){
    $isUserAdmin=true; // utlisateur a le role admin
  }
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/static/css/app.css">
  </head>
  <body>

        <nav  class="navbar navbar-dark bg-dark">

          <ul class="nav">
            <li class="nav-item">
               <a class="nav-link" href ="<?php echo BASE_URL ?> /index.php">Accueil </a>
            </li>
            <?php
                if($isUserAdmin){
                  echo '<li class ="nav-item">';
                  echo  '<a class="nav-link" href ="'.BASE_URL.'/dashbord.php"> Administration </a>';
                  echo  '</li>';
                }

             ?>
            <li class="nav-item">
              <?php
               if ($isUserConnected) {

                 echo '<a class= "nav-link" href ="'.BASE_URL.'/logout.php">';
                 echo  $_SESSION['user']['firstname'].' (Deconnecté(e)) </a> ';
               } else {
                  echo '<a class="nav-link" href ="'.BASE_URL.'/login_form.php">Connexion </a>';
               }
               ?>

            </li>
          </ul>

        </nav>
