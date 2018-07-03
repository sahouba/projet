<?php
include ('config.php');
include(TEMPLATES_PATH.'\header.php');
 if (!$isUserAdmin) {
    header('location:index.php');
    // posiblite redigé l'utilisateur vers page spécifique example :farbbiden_access.html
 }
?>

<h2>Administration du site  </h2>
<img src="static\img\admin.png" class="rounded float-right" alt="...">
<ul>
  <li>  <a  class="btn btn-primary" data-toggle="collapse"href="manager\country\list.php"> Pays </a></li>
    <li>  <a  class="btn btn-primary" data-toggle="collapse"href="manager\trip\list.php"> Voyages </a></li>
      <li>  <a  class="btn btn-primary" data-toggle="collapse"href="manager\user\list.php"> User </a></li>
</ul>
<?php include('templates\footer.php') ?>
