<?php
require_once('../../dbmanager.php');
include('../..\templates\header.php');

$users= getUSers();
 //var_dump($users);
 ?>
 <a class="btn btn-primary" href ="adduser.php">Ajouter un user </a>
 <img src="..\..\static\img\admin.png" class="rounded float-right" alt="...">

 <table class="table">
      <tr scope="col"><h1>Liste des Users </h1</tr>
   <thead class="thead-light">
   <tr>

     <th scope="col">Nom</th>
     <th scope="col">Prénom</th>
     <th scope="col">Email</th>
     <th scope="col">Mot de passe</th>
        <th scope="col">Actions</th>
   </thead>
   </tr>
   <?php
   foreach ($users as $user): ?>
   <tr>
     <td scope="col"><?php echo $user['firstname'] ?></td>
     <td scope="col"><?php echo $user['lastname'] ?></td>
     <td scope="col"><?php echo $user['email'] ?></td>
     <td scope="col"><?php echo $user['password'] ?></td>
     <td>
        <a  class="btn btn-primary "href="edituser.php?id=<?php echo $user['id'] ?>">Editer</a>
        <a
        class="btn btn-danger btn-sm"href="deleteuser.php?id=<?php echo $user['id'] ?>">Supprimer</a>
     </td>
   </tr>

    <?php endforeach; ?>
 </table>



 <?php include('../..\templates\footer.php') ?>
