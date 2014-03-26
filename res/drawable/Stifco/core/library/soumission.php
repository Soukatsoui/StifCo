<?php
 //-> Récupération des variables POST ou sortie en cas d'absence
 $laDate = $_POST['date'];
 $_POST['ville'] != "" ? $ville = $_POST['ville'] : exit("Le champ ville est vide !");
 $lieu = $_POST['lieu'];
 $places = $_POST['places'];
 $_POST['gare'] != "" ? $gare = $_POST['gare'] : exit("Le champ gare est vide !");
 
 // Recherche du mois
 $posFirstTiret = stripos($laDate, '-');
 $posLastTiret = strrpos($laDate, '-');
 $longueur = $posLastTiret-$posFirstTiret;
 $mois = substr($laDate, $posFirstTiret+1,$longueur);
 
 switch ( $mois ) {
     case 1: $lemois="janvier";
             break;
     case 2: $lemois="fevrier";
             break;
     case 3: $lemois="mars";
             break;
     case 4: $lemois="avril";
             break;
     case 5: $lemois="mai";
             break;
     case 6: $lemois="juin";
             break;
     case 7: $lemois="juillet";
             break;
     case 8: $lemois="aout";
             break;
     case 9: $lemois="septembre";
             break;
     case 10: $lemois="octobre";
             break;
     case 11: $lemois="novembre";
             break;
     case 12: $lemois="decembre";
             break;
  }
  
 //-> Récupération du modèle SQL 
 require_once "../model/db.php";
 $mysqli = $sql->getConnection(); 

 //-> Recherche de la date dans la table des utilisateurs
 $requete = "SHOW TABLES LIKE '".$lemois."'";
 $resultat = operation( $mysqli, $requete );
 $nb = $resultat->num_rows;
	
 if ( $nb == 0 ) {
   // Table du mois non existante
  $requete = "CREATE TABLE `".$lemois."` ";
  $requete.= "( `id` varchar(18) NOT NULL, `ville` varchar(60) NOT NULL, `lieu` varchar(18) NOT NULL, `places` int(11) NOT NULL, `gare` varchar(50) NOT NULL,";
  $requete.= " PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
  $resultat = operation( $mysqli, $requete );
 }

 $requete = "SELECT id FROM `".$lemois."` WHERE id LIKE '".$laDate."';";
 $resultat = lectureOne( $mysqli, $requete, 0 );

 //-> Si la date n'a pas déjà été enregistrée
 if ( !$resultat ) {
  $requete = "INSERT INTO `".$lemois."` (`id`,`ville`,`lieu`,`places`,`gare`) VALUES (";
  $requete.= "'".$laDate."','".$ville."','".$lieu."',".$places.",'".$gare."');";
  $resultat = operation( $mysqli, $requete );
 
  if ( !$resultat ) {
   echo "L'insertion à échouée...";
  } else {
     echo "insertion_ok";
   }
 }  
   
 ?>