<?php
require_once('../../dbmanager.php');
require_once('../../utilite.php');
include('..\..\templates\header.php');


$trips=getTrips($full=false); // équivalent à getrips(false)
 //var_dump($trips);

    //echo  transformSQLDate('2018-06-12');
    // 2018-06-12 => 12/06/2018
 ?>


 <link rel="stylesheet" href="..\..\static/css/bootstrap.min.css">
 <link rel="stylesheet" href="..\..\static/css/app.css">

  <img src="..\..\static\img\admin.png" class="rounded float-right" alt="...">

<a class="btn btn-primary" href ="add.php">Ajouter un Voyage </a>



<table class="table table-bordered">
  <thead class="thead-light">
  <tr>
    <tr scope="col"><h1>Liste des Voayges </h1</tr>
    <th scope="col">Intitué</th>
    <th scope="col">Destination</th>
    <th scope="col">Date</th>
    <th scope="col">Action</th>
  </thead>
  </tr>
  <?php foreach ($trips as $trip) :?>
    <tr>
      <td><?php echo $trip['title']; ?></td>
      <td> <?php echo $trip['country_name']; ?></td>
      <td><?php echo 'Du '. transformSQLDate($trip['date_start']);
                echo '  au ' .transformSQLDate($trip['date_end']); ?></td>
      <td>
          <a  class="btn btn-primary bouton-image monBouton"href="edit.php?id=<?php echo $trip['id'] ?>">Editer</a>
          <a
          class="btn btn-danger btn-sm"
          href="delete.php?id=<?php echo $trip['id'] ?>">Supprimer</a>
      </td>
    </tr>
  <?php  endforeach; ?>
</table>
 <?php include('..\..\templates\footer.php');?>
