<?php
include ('config.php');
include(TEMPLATES_PATH.'\header.php');  ?>

<form  class="px-4 py-3" action="login_process.php" method="post" >
 <div class="form-group" >
    <label for="exampleDropdownFormEmail2">Email address</label>
 <input  class="centre-control"type="text" name="email" value="" placeholder="name@exemple.com">
 </div>
 <div class="form-group">
  <label for="exampleDropdownFormPassword2">Password</label>
 <input type="password" name="password" value="" placeholder="Password">
 </div>

<button class="btn btn-success" type="submit" name="submit">Connecter</button>

</form>



<?php include('templates\footer.php') ?>
