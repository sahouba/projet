<?php

include_once('../../config.php');
include('../../dbmanager.php');
include('..\..\templates\header.php');
$db=db_connect();
if (isset($_POST['submit'])) {
  // formulaire posté => écriture enBD
   $result=updateTrip($_POST['id'],$_POST);
    //var_dump($result);
    if ($result) {
       header('location:list.php');
    } else {
      echo '<p>Probléme</p>';
    }

}else {
  // recupération de champs actuelsafin de préremplir le formulaire
  $countries=getCountries();
  $trip = getTripById($_GET['id']);
   //var_dump($trip);
   $pictures =getPictureBytrip($_GET['id']);
    //var_dump($pictures);
}
 ?>



 <h3>Detaile  </h3>

 <div class="container">
   <div class="row">
     <div class="col-md-6">

       <form class="" action="edit.php" method="post">
         <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
         <div class="form-group">
              <input type="text" name="title" placeholder="Nom" value="<?php echo $trip['title'] ?>">
         </div>
         <div class="form-group">
           <select class="country" name=" country">
            <option value="0"> Sélectionner un pays</option>
            <?php if ($countries): ?>
              <?php foreach ($countries as $country): ?>
                <?php if($country['id']==$trip['country']): ?>
                  <option  selected value="<?php echo $country['id'] ?>">
                      <?php echo $country['name'] ?>
                  </option>
                <?php else: ?>
                  <option value="<?php echo $country['id'] ?>">
                      <?php echo $country['name'] ?>
                  </option>
                <?php endif; ?>

                  <?php endforeach; ?>
             <?php endif; ?>


           </select>
         </div>
          <div class="form-group">
            <label for="date_start">Date de départ</label>
                 <input type="date" name="date_start" value="<?php echo $trip['date_start'] ?>">
          </div>
          <div class="form-group">
            <label for="date_end">Date de retour</label>
                 <input type="date" name="date_end" value="<?php echo $trip['date_end'] ?>">
          </div>
          <div class="form-group">
            <input type="text" name="price"  placeholder="Prix" value="<?php echo $trip['price'] ?>">

          </div>
          <div class="form-group">
             <textarea  style="width:100%; height:200px" placeholder="Descriptif" name="description" ><?php echo $trip['description'] ?></textarea>
          </div>

       </form>

     </div>
     <div class="col-md-6">
       <!-- formulaire de  photo  -->

        <h2> Photos Associées</h2>
         <?php  if ($pictures!= null && sizeof($pictures)>0) {
          foreach ($pictures as $picture) {
            $picture_path= BASE_URL .'/static/img/upload/'.$picture['path'];
             echo '<img class="thumbnail" src="'.$picture_path.'">';
          }
        } else {
            echo " <p> Aucun  Photo Associée </p>";
         }
         ?>
     </div>
   </div>
 </div>


 <?php
 include('..\..\templates\footer.php'); ?>
