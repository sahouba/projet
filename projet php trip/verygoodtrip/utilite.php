<?php

function transformSQLDate($sql_date){
  $date =date_create($sql_date);  // native PHP
   return date_format($date,'d/m/Y');
}
function cleanInput($str){
  $cleanedstr =strip_tags($str); // suprimer toutes les balises html et PHP
   $cleanedstr =trim($cleanedstr); // suprimer les espaces initiaux et finaux
  return $cleanedstr;
}
 ?>
