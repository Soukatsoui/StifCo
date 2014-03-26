<?php
 //-> Récupération des demandes par des variables de session
 $gare = $_SESSION['gare'];
 $mois = $_SESSION['mois'];

 //-> Flag par défaut indiquant un résultat de la recherche
 $sortie = true;
 
 //-> Récupération du modèle SQL 
 require_once "./core/model/db.php";
 $mysqli = $sql->getConnection(); 

  //-> Recherche déjà de l'existence de la table du mois
 $requete = "SHOW TABLES LIKE '".$mois."'";
 $resultat = operation( $mysqli, $requete );
 $nb = $resultat->num_rows;

 if ( $nb == 0 ) {
  // Table du mois non existante
  $sortie = false;
 } else {
    $requete = "SELECT * FROM `".$mois."` WHERE gare LIKE '".$gare."';";
    $tabResultat = lectureAll( $mysqli, $requete, 0 );

     //-> Traitement du résultat
    if ( !$tabResultat ) {
        
     $sortie = false;
    } else {
       $totalTabResultat = count( $tabResultat );
   }
  } 

  //-> Appel de la vue
  require_once 'vueFichierJSON.php';
 ?>