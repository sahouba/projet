<?php
include('../../dbmanager.php');
// traitement du formulaire photo
// var_dump($_POST);
// echo '<br> <br><br><br>';
// var_dump($_FILES);
   //echo $_SERVER['DOCUMENT_ROOT'];
 // déplacement du ficher depuis son emplacement temporaire
 // vers son emplacement choisi
 if ($_FILES['picture']['size'] > 500000) { // 500 KB
   echo '<p>ficher trop lourd</p> ';
 }else {
   $from = $_FILES['picture']['tmp_name'];
    $to = $_SERVER['DOCUMENT_ROOT']
    .'/intro/verygoodtrip/static/img/upload/'.$_FILES['picture']['name'];
        $result = move_uploaded_file($from,$to);
      if ($result) {
      echo '<p> Ficher téléchargé avec succés</p>';
      //enregistrement en BD
      if (insertPicture($_POST['trip_id'],
                       $_FILES['picture']['name'])
         ){
               echo '<p>Enregistrement en DB OK </p>';
               header('location:edit.php?id='.$_POST['trip_id']);

            }
                    }


 }
 ?>
