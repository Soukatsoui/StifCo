<?php
 //-> Récupération des variables POST ou sortie en cas d'absence
 $_POST['v0'] != "" ? $nom = $_POST['v0'] : exit("Le champ nom est vide !");
 $_POST['v1'] != "" ? $prenom = $_POST['v1'] : exit("Le champ prénom  est vide !");
 $_POST['v2'] != "" ? $adresse = $_POST['v2'] : exit("Le champ adresse est vide !");
 $_POST['v3'] != "" ? $ville = $_POST['v3'] : exit("Le champ ville est vide !");
 $_POST['v4'] != "" ? $codepostal = $_POST['v4'] : exit("Le champ codepostal est vide !");
 $_POST['v5'] != "" ? $email = $_POST['v5'] : exit("Le champ email est vide !");

 //-> Récupération du modèle SQL 
 require_once "../model/db.php";
 $mysqli = $sql->getConnection(); 

 //-> Recherche de l'email dans la table des utilisateurs
 $requete = "SELECT email FROM user WHERE email='".$email."';";
 $resultat = lectureOne( $mysqli, $requete, 0 );

 //-> Si l'email n'a déjà pas été enregistré
 if ( !$resultat ) {
  //-> Lancement de l'insertion
  $requete = "INSERT INTO `user` (`email`,`nom`,`prenom`,`adresse`,`ville`,`codepostal`) VALUES (";
  $requete.= "'".$email."','".$nom."','".$prenom."','".$adresse."','".$ville."',".$codepostal.");";
  $resultat = operation( $mysqli, $requete );
 
  if ( !$resultat ) {
   echo "9";
  } else {
  	 //-> Retour à la première page
  	 session_name('stifco');
     session_start();
 
     $_SESSION['page'] = 1;
     echo "1";
   }
 } else {
    //-> Erreur car l'email est déjà enregistré
    echo "2"; 
  }  
 ?>