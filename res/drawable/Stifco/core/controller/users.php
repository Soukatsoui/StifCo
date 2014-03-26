<?php
  //-> Récupération de l'objet SQL et de son instance
  require_once 'db.php';
  $mysqli = $sql->getConnection(); 

  //-> Récupération de tous les utilisateurs
  $requete = "SELECT * FROM user;";
  $tabUsers = lectureAll( $mysqli, $requete );
  $totalUsers = count( $tabUsers );

  //-> Appel de la vue
  require_once 'vueUsers.php';
 ?>