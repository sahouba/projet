<?php
require_once('config.php');
 // table country
function getCountries(){
  $db=db_connect();
  $countries=null;

   //var_dump($db);
   if ($db) {
    $query=$db->prepare('SELECT * FROM country  ORDER BY name ASC');
    $result=$query->execute();
      if ($result) {
       //var_dump($result);
        $countries= $query->fetchAll(PDO::FETCH_ASSOC);
       //var_dump($countries);
          return $countries;
    }
   }
   return $countries;
}
 // table trip
function getTrips($full=true){
  $db=db_connect();
  $trips=null;

   //var_dump($db);
   if ($db) {
     if ($full) {
       $query=$db->prepare('SELECT * FROM trip  ORDER BY date_start DESC');
     }else {
       // si le paramétre est false, on ne prend qu'une parte des colonnes
         $query=$db->prepare('SELECT trip.id,title,country,date_start,date_end,name AS country_name
           FROM trip
           LEFT JOIN country on trip.country =country.id
           ORDER BY date_start DESC');
     }

    $result=$query->execute();
      if ($result) {
       //var_dump($result);
        $trips= $query->fetchAll(PDO::FETCH_ASSOC);
       //var_dump($trips);
          return $trips;
    }
   }
   return $trips;
}

function getTripById($id){
  $db=db_connect();
  if ($db) {

      $query=$db->prepare('SELECT * FROM trip  WHERE id =:id ');
      $result=$query->execute(array(':id' => $id));
      if ($result) {
         return $query->fetch(PDO::FETCH_ASSOC);
      }
     }
     return  null ;
    }

function updateTrip($id,$data){
  $db=db_connect();
  if ($db){
    $query=$db->prepare(
      'UPDATE  trip
       SET   country     = :country,
             date_start  = :date_start,
             date_end    = :date_end,
             title       = :title ,
             description = :description,
             price       = :price
             WHERE id    = :id
    ');
    $result=$query->execute(array(
         ':id'          =>$id,
         ':country'     =>$data['country'],
         ':date_start'  =>$data['date_start'],
         ':date_end'    =>$data['date_end'],
         ':title'       =>$data['title'],
         ':description' =>$data['description'],
         ':price'       =>$data['price']

    ));
  return $result;
  }
  return null ;
}

function deleteTrip($id) {
  $db = db_connect();
  if ($db) {
    $query = $db->prepare(
      'DELETE FROM trip WHERE id = :id');
    $result = $query->execute(array(':id' => $id));
    return $result;
  }
  return null;
}

function searchtrip($criteria){
    $db=db_connect();
  if ($db) {
          $sql='SELECT  trip.id,title,date_start,date_end,price, name AS country_name
          FROM trip
          LEFT JOIN country ON trip.country=country.id
           WHERE trip.id > 0';
          if ($criteria['country']!= null) {
            $sql .=' AND  country ='.$criteria['country'];
          }
          if ($criteria['date_start']!= null) {
          //  echo '<p>'.$criteria['date_start']  .'</p> ';
            // sql exige la présence de single quotes autour de la date
            // 2018-08-24 => ca marche pas
            // '2018-08-24 ' => ca marche
              $sql .=' AND  date_start >'.'\''
              .$criteria['date_start'].'\'';

          }
          if ($criteria['date_end']!= null) {
          //  echo '<p>'.$criteria['date_end']  .'</p> ';
            // sql exige la présence de single quotes autour de la date
            // 2018-08-24 => ca marche pas
            // '2018-08-24 ' => ca marche
              $sql .=' AND  date_end <='.'\''
              .$criteria['date_end'].'\'';

          }
          if ($criteria['price']!= null) {
            $sql .=' AND  price <'.$criteria['price'];
          }

          $query =$db->prepare($sql);
          $result=$query->execute();
             if ($result) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
                           }
            }

}

 // table picture

function insertPicture($trip_id,$path){
  $db=db_connect();
  if ($db) {
    $query=$db->prepare(
      'INSERT INTO picture(trip_id,path)
      VALUES(:trip_id,:path)
      ');
    $result =$query->execute(array(
      ':trip_id'=> $trip_id,
      ':path'=> $path
    ));
    return $result;
  }
  return null ;
 }

function getPictureBytrip($trip_id){
  $db=db_connect();
  if ($db) {
    $query=$db->prepare ('SELECT * FROM picture WHERE trip_id =:trip_id');
    $result =$query->execute(array(':trip_id'=>$trip_id));
    if($result){
      return $query->fetchAll(PDO::FETCH_ASSOC);
    }
  }
  return null;
}

// table user

function getUSers(){
  $db=db_connect();
  $users=null;
   //var_dump($db);
   if ($db) {
    $query=$db->prepare('SELECT * FROM  user  ');
    $result=$query->execute();
      if ($result) {
       //var_dump($result);
        $users= $query->fetchAll(PDO::FETCH_ASSOC);
       //var_dump($countries);
          return $users;
    }
   }
   return $users;

}

?>
