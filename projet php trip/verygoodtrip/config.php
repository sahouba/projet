<?php
 // déclaration de constantes
   define('TEMPLATES_PATH',
   'C:\xampp\htdocs\intro\verygoodtrip\templates');
    define('BASE_URL',
    'http://localhost/intro/verygoodtrip');
    function db_connect(){
      try {
              $db =new PDO ('mysql:host=localhost;dbname=verygoodtrip','root','');
              $db->exec('SET NAMES utf8');  // paramétre  assure l'encodage utf8 des données si succés on renvoie l'objet $db
                return $db;
                // en cas de succé on a l'objet db
      } catch (PDOException $e) {
            return null;
            // si en cas d'erreur on renvoie null
      }

    }
   ?>
