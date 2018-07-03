<?php
require_once('dbmanager.php');
require_once('utilite.php');

include(TEMPLATES_PATH.'\header.php');
$countries =getCountries();
if (isset($_GET['submit'])) {
   // le client a clique sur le button Rechercher
   $criteria = array(
     'country'    =>null,
     'date_start' =>null,
     'date_end'   =>null,
     'price'      =>null
   );
   // is conditions de validation respectées on écrase null
   // par la valeur validée(autorisée )
   if ($_GET['country']>0) {
     $criteria['country']=$_GET['country'];
   }
   if ($_GET['date_start']!="") {
      //echo 'ok';
     $criteria['date_start']=$_GET['date_start'];
   }
   if ($_GET['date_end']!="") {
    // echo 'ok';
     $criteria['date_end']=$_GET['date_end'];
   }
   if ($_GET['price']!="") {
      //echo 'ok';
     $criteria['price']=$_GET['price'];
   }
   $trips=searchtrip($criteria);
   //var_dump($trips);
}

?>


<h2>Welcome To World Trip </h2>

 <form  method="get">

  <select class="" name="country">
         <option value="0"> Choisir une destination</option>
    <?php

    foreach ($countries as $country) {
         echo '<option value="'.$country['id'].'">'
           .$country['name'].'</option>';
    } ?>
  </select>

  <span> Entre le :</span>
    <input type="date" name="date_start" value="">
     <span> Et le :</span>
     <input type="date" name="date_end" value="">


     <input type="text" name="price" value="" placeholder="Prix Maximal">
     <input  class=" btn btn-primary btn-sm"type="submit" name="submit" value="Rechercher">
 </form>
 <?php if (isset($_GET['submit'])):?>
 <div class="">
   <p> Filtres utilisés </p>
   <?php if (sizeof($trips)>0) {
       echo 'Pays:'.$trips[0]['country_name'].',';
   } ?>
    Date de début: <?php echo $_GET['date_start'] ?>
     Date de fin: <?php echo $_GET['date_end'] ?>
      Prix Max: <?php echo $_GET['price'] ?>

 </div>
   <table class="table table-bordered">
     <thead class="thead-light">
     <tr>
       <tr scope="col"><h1>Liste des Voayges </h1</tr>
       <th scope="col">Intitué</th>
       <th scope="col">Destination</th>
       <th scope="col">Date</th>
       <th scope="col">Prix</th>
     </thead>
     </tr>
     <?php foreach ($trips as $trip) :?>
       <tr>

         <td> <a href="manager\trip\details.php?id=<?php echo $trip['id'] ?>"> <?php echo $trip['title']; ?> </a></td>
         <td> <?php echo $trip['country_name']; ?></td>
         <td><?php echo 'Du '. transformSQLDate($trip['date_start']);
                   echo '  au ' .transformSQLDate($trip['date_end']); ?></td>
         <td> <?php echo $trip['price'].' Euro'; ?> </td>

       </tr>
     <?php  endforeach; ?>
   </table>
 <?php  endif; ?>
<?php include('templates\footer.php') ?>
