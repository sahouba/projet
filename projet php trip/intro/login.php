<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <!--  <form action ="" method="POST">   la methode post masque les information
    et get afficher les info-->
      <form action ="" method="POST">
        <input type="text" name="email" value=""placeholder="Email...">
          <input type="password" name="password" value=""placeholder="Mot de passe...">
            <input type="submit" name="submit" value="Connexion">
      </form>
      <?php
      $test ="";
      if (isset($_POST['submit'])) {
        //print_r ($_GET); // affichage de contenu tablea , echo ne peut pas faire
        $email =$_POST['email'];
        $password =$_POST['password'];
        if ($email == 'test@test.fr' && $password ==1234 ){
          echo "Utiliseteur trouvé dans la base";

        }else {
          echo "inconnu";

        }

      }

       ?>
  </body>
</html>
