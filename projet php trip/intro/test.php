<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/app.css">
</head>

<body>

<?php
        // variables

    //type simple (primitifs,scalaires)
        $message ='Bienvenue  a tous !';
        $age =18 ;
        $weight= 80.5 ;//floot
        $logged =false;
        $name=null;
        $html='';

      // type  complexes
      //tableau simples , par indice 0
        $months =['jan','fév','Mars'];
        $bazar =['chaine',99,true,null,$age,$message,$months ];
        //tableau associatif (clé associée a valuer)
        $lloris =[
          'name'=> 'Hugo Lloris',
          'number' =>1,
          'club' =>'Totteham ',
          'injured' => true
        ];
        $Matuidi =[
          'name'=> 'Blaise matudi',
          'number' =>6,
          'club' =>'Juvents ',
          'injured' => true
        ];
        $pogba =[
          'name'=> 'Paul Pogba',
          'number' =>6,
          'club' =>'Manchester ',
          'injured' => false
        ];
        $players =[$lloris,$Matuidi,$pogba];
       //  echo $lloris['name'];
       //  echo "<br>";
       //  echo $Matuidi['club'];
       //  //echo $bazar[6][2];
       //  echo '<h1>'. $message. '</h1>';
       //  echo  $age *2;
       //      if ($logged)
       //      {
       //      echo " <br> User Connecter";
       //    } else {
       //      echo " <br>user non connecter";
       //    }
       //
       // if ($age >17) {
       //   echo "<p> tu es majeur, tant mieux</p>";
       // } else {
       //   echo "<p> tant pis, tu ne peux pas accéder à ce contenu</p>";
       // }
      //boucles
      // affichage d'une liste de mois
      $html='<ul>';
      for ($i=0; $i<sizeof($months); $i++) {
        $html .= '<li>'.$months[$i] .'</li>';

      }
      $html .='</ul>';
      echo $html;
      // fin de  premiére block php
?>
      <div >
        <input id="cbInjured" type="checkbox">
        <span>Joueurs blessés</span>
      </div>
      <form >
        
        <div >
          <input id="cbInjured2" type="checkbox">
          <span>Joueurs blessés 2</span>
          <input type="submit" name="" value="send">
        </div>

      </form>

<?php
      // declaration de tableau via la fonction   array
      $tableHeaders = array('Nom','Numéro','club','Etat de forme');
      $html ='<table class ="table table-bordered table-striped">';
      //$html .='<td><h2>'. 'Name'.'</h2> </td> <td><h2>'. 'Number'.'</h2> </td> <td><h2>'.'Club'.'</h2> </td> <td><h2>'. 'Etats'.'</h2> </td>' ;
      $html .=buildTableHeader($tableHeaders);
          function buildTableHeader($columnHeaders){
            $ouput='<tr>';
            foreach ($columnHeaders as $Header) {
              $ouput .='<th>'.$Header.'</th>';
            }
            $ouput .= '</tr>';
            return $ouput;
          }
      foreach ($players as $player) {

      $html .='<tr>';
      $html .='<td>'.$player['name'].' </td>';
      $html .='<td>'.$player['number'].' </td>';
      $html .='<td>'.$player['club'].' </td>';
      // if($player['injured']){
      //   $html .='<td> Blessé</td>';
      // } else {
      //     $html .='<td>  En pleine Forme</td>';
      // }
      $html .=($player['injured'])? '<td class ="injured"> Blessé</td>': '<td>  En pleine Forme</td>';
       $html .='</tr>';
      }
      $html .='</table>';
      echo $html;
?>
<script type="text/javascript"
 src="https://cdnjs.cloudflare.com/ajax/libs/zepto/1.2.0/zepto.min.js"></script>
<script type="text/javascript" src="js/app.js">

</script>
</body>
</html>
