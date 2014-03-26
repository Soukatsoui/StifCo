<?php
 $email = $_POST['email'];

 //-> Récupération du modèle SQL 
 require_once "../model/db.php";
 $mysqli = $sql->getConnection(); 

 //-> Recherche de l'email dans la table des utilisateurs
 $requete = "SELECT * FROM user WHERE email='".$email."';";
 $resultat = lectureOne( $mysqli, $requete, 1 );
 
 //-> Si l'adresse email n'a déjà pas été enregistré
 if ( $resultat ) {
  //-> Retour validé
  echo $resultat['email'];
 } else {
    //-> Erreur car l'email n'est pas enregistrée
    echo "pas_ok"; 
  }  
 ?>