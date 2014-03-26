<?php
 //-> Récupération des variables POST
 $laDate = $_POST['date'];
 $laVille = $_POST['ville'];
 $lesPlaces = $_POST['places'];
 $laGare = $_POST['gare'];
 
 $posFirstTiret = stripos($laDate, '-');
 $posLastTiret = strrpos($laDate, '-');
 $longueur = $posLastTiret-$posFirstTiret;
 $mois = substr($laDate, $posFirstTiret+1,$longueur);
 $leMois;
 
 switch ( $mois ) {
     case 1: $leMois="janvier";
             break;
     case 2: $leMois="fevrier";
             break;
     case 3: $leMois="mars";
             break;
     case 4: $leMois="avril";
             break;
     case 5: $leMois="mai";
             break;
     case 6: $leMois="juin";
             break;
     case 7: $leMois="juillet";
             break;
     case 8: $leMois="aout";
             break;
     case 9: $leMois="septembre";
             break;
     case 10: $leMois="octobre";
             break;
     case 11: $leMois="novembre";
             break;
     case 12: $leMois="decembre";
             break;
  }
   
 //-> Récupération du modèle SQL 
 require_once "../model/db.php";
 $mysqli = $sql->getConnection(); 

 //-> Recherche déjà de l'existence de la table du mois
 $requete = "SHOW TABLES LIKE '".$leMois."'";
 $resultat = operation( $mysqli, $requete );
 $nb = $resultat->num_rows;

 if ( $nb == 0 ) {
  // Table du mois non existante
  echo "Aucune proposition pour ce mois-ci!";
 } else {
    $requete = "SELECT * FROM `".$leMois."` WHERE gare LIKE '%".$laGare."%' AND ville LIKE '%".$laVille."%'AND places >='".$lesPlaces."';";
    $tabResultat = lectureAll( $mysqli, $requete, 0 );

    //-> Traitement du résultat
    if ( !$tabResultat ) {
     // Le mois existe mais il n'y a pas de propositions
     echo "Aucune proposition pour ce jour-ci !";
    } else {
       $totalTabResultat = count( $tabResultat );
       $json = json_encode( $tabResultat );
       $json = "{\"propositions\":".$json."}";
       echo $json;    
      }
   }
 ?>