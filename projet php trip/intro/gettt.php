<?php
$isFormSubmit =false ;//  booléen variables permettant de savoire  si le formulaire a été soumis par l'utlisateur
$images  = array(
    ["title"=> "Daulphin","file"=> "daulphin.jpg"],
      ["title"=> "Loup","file"=> "loup.jpg"],
        ["title"=> "Toureau","file"=> "touro.jpg"]
);
 if(isset($_GET['submit'])) $isFormSubmit =true;
 echo ( $isFormSubmit) ? 'Formulaire soumis' : 'formulaire non soumis';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <form class="" action="" method="get">
        <select name="selectedImage">
          <option value="0" >Choisir un animal</option>
          <?php
            foreach ($images as $image ) {
              if ($isFormSubmit) {
              $selectedImage = $_GET['selectedImage'];
              if ($image['file'] == $selectedImage ) {
                echo '<option selected value="'.$image['file'].'">'.$image['title'].'</option>';
              } else {
                echo '<option value="'.$image['file'].'">'.$image['title'].'</option>';
              }
            } else {
              echo '<option value="'.$image['file'].'">'.$image['title'].'</option>';
            }
          }
           ?>
        </select>
        <input type="submit" name="submit" value="Valider">

      </form>
      <!--  la balise génére  une requéte http GET ,ici sans paramétres -->
      <a href="gettt.php">Reset</a>
  <div class="">
      <?php
         if ($isFormSubmit) {
           $image =$_GET['selectedImage'];
           if ($image !="0") {
             $file='img/'.$image;
             echo '<img src = "'.$file.'">';
           }
           }

       ?>
  </div>

  </body>
</html>
