<?php
// remonte de 2niveaux pour accéder au ficher
// amélioration possible :déterminer
// dynamiquement le chemin du ficher
require_once('../../dbmanager.php');
include('..\..\templates\header.php');

// récupération des Pays
$countries=getCountries();
 //var_dump($countries);


 ?>


<link rel="stylesheet" href="..\..\static/css/bootstrap.min.css">
<link rel="stylesheet" href="..\..\static/css/app.css">

 <img src="..\..\static\img\admin.png" class="rounded float-right" alt="...">
 <a class="btn btn-primary" href ="add.php">Ajouter un Pays </a>

 <table class="table">
   <thead class="thead-light">
   <tr>
     <tr scope="col"><h1>Liste des Pays </h1</tr>
     <th scope="col">Nom</th>
     <th scope="col">Actions</th>
   </thead>
   </tr>
   <?php
   foreach ($countries as $country): ?>
   <tr>
     <td scope="col"><?php echo $country['name'] ?></td>
     <td>
        <a  class="btn btn-primary bouton-image monBouton"href="edit.php?id=<?php echo $country['id'] ?>">Editer</a>
        <a
        class="btn btn-danger btn-sm"
        href="delete.php?id=<?php echo $country['id'] ?>">Supprimer</a>
     </td>
   </tr>

    <?php endforeach; ?>
 </table>






<?php include('..\..\templates\footer.php') ?>
