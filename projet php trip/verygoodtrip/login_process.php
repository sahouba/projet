<?php

// ficher responsable du traitement de login
// analyser $POST
if(isset($_POST['email']) && isset($_POST['password'])){
 // interroger la BD avec la classe PDO
 try{
    $db =new PDO ('mysql:host=localhost;dbname=verygoodtrip','root','');
    //$test = true ;
     //echo  gettype($db);
       //var_dump($db);

       // Etape 1 :preparation de la requéte
       $stmt=$db->prepare('select * from user where email = :email
        and password = :password');
        // Etape 2: binding (associe une valeur à un placeholder)
              $stmt ->bindParam(':email',$_POST['email']);
              $stmt ->bindParam(':password',$_POST['password']);
        // Etape 3: Execution de la requéte

        $stmt -> execute();
        // Etape 4: Récuperation des données sql -> php
        $users=$stmt ->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($users);
      // echo sizeof($users).' : utilisateur trouvé';
      if (sizeof($users)>0) {
        //echo 'Salut cher '.$users[0]['firstname'];
        // IMPORTANT :il faut mémoriser l'état "identifé"
        // l'utilisateur avant le rediction
        //sinon on perd le travaille efféctier avant
        // du au fait que le protocole http est stateless (amésiqué)
        // il existe +ieurs solutios à ce probléme:
        // base de données ,ficher texte , session...
        //utilisation de la session
        session_start(); // Fonction ouvrant ou reprenant la session
         //var_dump($_session);
         $_SESSION['user']=$users[0]; // stockage de l'utilisateur connecté ds la session
         //var_dump($_SESSION);
        //redirection la page  a la page index.php
        header('location:index.php');
      }else {
        echo "Utilisateur incoonu ou mot de passe erroné";
      }
 }catch(PDOException $e){
   echo 'Probléme'.$e ->getMessage();


 }
}else {
  echo "Information manquantes ... !";
}


 ?>
