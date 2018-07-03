<?php
include('../../config.php');
include('../../utilite.php');
include('..\..\templates\header.php');

$db=db_connect();
 //var_dump($db);
 // test
 // $s="<p> belg<br><br><br>ique</p>";
 $s="<script> alert ('ok')</script>";
  //echo $s;
   //echo cleanInput($s);
 // var_dump($s);
 // var_dump(cleanInput($s));


// traitement du formulaire
 if (isset($_POST['submit'])) {
   // nettoyage des inputs
  $cleaned_name = cleanInput($_POST['name']);
    if (strlen($cleaned_name) > 2) {
      // si le  nom de pays a plus de 2 caractéres
      //écriture dans base donner
      if ($db!= null) {

        // 1: preparation une requéte
       $query=$db->prepare('INSERT INTO country(name) VALUES (:name)');
        //2:exécution +binding
       $result= $query->execute( array(':name' =>$cleaned_name));
        //var_dump($result);
        if ($result) {
           header('location:list.php');
           echo '<div class="alert alert-success"><strong>Success!</strong> Pays Ajouter</div>';
        }else {
          echo '<div class="alert alert-danger"> <strong> Danger! </strong> Ajout echoué </div>';
        }
      }
    }
 }
 ?>
<link rel="stylesheet" href="..\..\static/css/bootstrap.min.css">
<link rel="stylesheet" href="..\..\static/css/app.css">
<h2>Formulaire d'ajout </h2>
 <img src="..\..\static\img\admin.png" class="rounded float-right" alt="...">
 <form class="" action="add.php" method="post">
   <input type="text" name="name" placeholder="Nom" value="">
   <input type="submit" name="submit" value="Enregistrer">
 </form>

<?php include('..\..\templates\footer.php');

 ?>
