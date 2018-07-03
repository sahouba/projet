<?php
include('../../config.php');
include('..\..\templates\header.php');
$db=db_connect();
//initialisation d'un tableau vide (pas obligatoire)
$country= array('id' => 0,'name'=>'' );
      if (isset($_POST['submit'])) {
       //  var_dump($_POST);
       if ($db) {
        $query=$db->prepare('UPDATE country SET name=:name
           WHERE id=:id' );
              $result =$query->execute(array(':name'=>cleanInput($_POST['name']),':id'=>$_POST['id']));
              if ($result) {
                // code...
                header('location:list.php');
              }else {
                echo '<p>Probléme</p>';
              }
       }
      } else {
  // page accéde via la méthode GET
      if ($db) {
        $query=$db->prepare('SELECT * FROM country WHERE id = :id ');
        $result =$query->execute(array(':id'=>$_GET['id']));
          if ($result) {
             $country=$query->fetch(PDO::FETCH_ASSOC);
            // var_dump($country);
      }
  }
}

 ?>
 <link rel="stylesheet" href="..\..\static/css/bootstrap.min.css">
 <link rel="stylesheet" href="..\..\static/css/app.css">
 <h3>Mettre à jour un pays  </h3>
 <img src="..\..\static\img\admin.png" class="rounded float-right" alt="...">
     <form class="" action="edit.php" method="post">

              <input type="text" name="name" placeholder="Nom" value="<?php echo $country['name']; ?>">
              <!-- le champ hidden permet  de trasmettre id a la superglobale $_POST
               issue de la soumission du formulaire    -->
              <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
              <input type="submit" name="submit" value="Mettre à jour">
      </form>

  <?php
  include('..\..\templates\footer.php'); ?>
