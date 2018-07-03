<?php
include('../../config.php');
include('..\..\templates\header.php');
include('..\..\dbmanager.php');
$users=getUSers();
 ?>
 <h1>Ajouter un user</h1>
  <img src="..\..\static\img\admin.png" class="rounded float-right" alt="...">
  <form class="" action="adduser.php" method="post">
    <div class="form-group">
         <input type="text" name="firstname" placeholder="Nom" value="">
    </div>
    <div class="form-group">
         <input type="text" name="lastname" placeholder="Prénom" value="">
    </div>
    <div class="form-group">
         <input type="text" name="email" placeholder="Email" value="">
    </div>
    <div class="form-group">
         <input type="text" name="password" placeholder="Mot de passe" value="">
    </div>
    <div class="form-group">
      <select class="role" name=" role">
       <option value="0"> Sélectionner role</option>

              <option value="admi">Admin  </option>
                <option value="user">User  </option>



      </select>
    </div>


    <input type="submit" name="submit" value="Enregistrer">
  </form>
  <?php
  include('..\..\templates\footer.php');
   ?>
