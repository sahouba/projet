<?php
include('../../config.php');
include('..\..\templates\header.php');
include('..\..\dbmanager.php');
$countries=getCountries();
//var_dump($countries);
if (isset($_POST['submit'])) {
  $db=db_connect();
  if ($db) {
     $query=$db->prepare(
       'INSERT INTO trip(
         country,
         date_start,
         date_end,title,
         description,
         price)

         VALUES (
           :country,
           :date_start,
           :date_end,
           :title,
           :description,
           :price)

      ');
      $result=$query->execute(array(
        ':country'=>$_POST['country'],
        ':date_start'=>$_POST['date_start'],
        ':date_end'=>$_POST['date_end'],
        ':title'=>$_POST['title'],
        ':description'=>$_POST['description'],
        ':price'=>$_POST['price']
      ));
    //  var_dump($result);
    if ($result) {
       header('location:list.php');
    }
  }
}

 ?>
<link rel="stylesheet" href="..\..\static/css/bootstrap.min.css">
<link rel="stylesheet" href="..\..\static/css/app.css">
<h1>Ajouter un Voyage</h1>
 <img src="..\..\static\img\admin.png" class="rounded float-right" alt="...">
 <form class="" action="add.php" method="post">
   <div class="form-group">
        <input type="text" name="title" placeholder="Nom" value="">
   </div>
   <div class="form-group">
     <select class="country" name=" country">
      <option value="0"> Sélectionner un pays</option>
      <?php if ($countries): ?>
        <?php foreach ($countries as $country): ?>
             <option value="<?php echo $country['id'] ?>">
                 <?php echo $country['name'] ?>
             </option>
            <?php endforeach; ?>
       <?php endif; ?>


     </select>
   </div>
    <div class="form-group">
      <label for="date_start">Date de départ</label>
           <input type="date" name="date_start">
    </div>
    <div class="form-group">
      <label for="date_end">Date de retour</label>
           <input type="date" name="date_end">
    </div>
    <div class="form-group">
      <input type="text" name="price" value="" placeholder="Prix">

    </div>
    <div class="form-group">
       <textarea  placeholder="Descriptif"name="description" rows="8" cols="80"></textarea>
    </div>

   <input type="submit" name="submit" value="Enregistrer">
 </form>
<?php
include('..\..\templates\footer.php');
 ?>
