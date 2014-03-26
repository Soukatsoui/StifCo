<?php
 //-> Récupération de l'objet SQL et de son instance
 require_once 'db.php';
 $mysqli = $sql->getConnection(); 


 function tableMois($lemois,$mysqli) {
  $requete = "SHOW TABLES LIKE '".$lemois."'";
  $resultat = operation( $mysqli, $requete );
  $nb = $resultat->num_rows;
 
  if ( $nb == 0 ) {
   // Table du mois non existante
   return false;
  }
  
  return true;
 }
 
 //-> Récupération de toutes les propositions
 if (tableMois("janvier",$mysqli)) {
  $requete = "SELECT * FROM janvier;";
  $tabP01 = lectureAll( $mysqli, $requete );
  $totalP01 = count( $tabP01 );
 }
  
 if (tableMois("fevrier",$mysqli)) {
  $requete = "SELECT * FROM fevrier;";
  $tabP02 = lectureAll( $mysqli, $requete );
  $totalP02 = count( $tabP02 );
 }
 
 if (tableMois("mars",$mysqli)) {
  $requete = "SELECT * FROM mars;";
  $tabP03 = lectureAll( $mysqli, $requete );
  $totalP03 = count( $tabP03 );
 }
 
 if (tableMois("avril",$mysqli)) {
  $requete = "SELECT * FROM avril;";
  $tabP04 = lectureAll( $mysqli, $requete );
  $totalP04 = count( $tabP04 );
 }
 
 if (tableMois("mai",$mysqli)) {
  $requete = "SELECT * FROM mai;";
  $tabP05 = lectureAll( $mysqli, $requete );
  $totalP05 = count( $tabP05 );
 }
 
 if (tableMois("juin",$mysqli)) {
  $requete = "SELECT * FROM juin;";
  $tabP06 = lectureAll( $mysqli, $requete );
  $totalP06 = count( $tabP06 );
 }
 
 if (tableMois("juillet",$mysqli)) {
  $requete = "SELECT * FROM juillet;";
  $tabP07 = lectureAll( $mysqli, $requete );
  $totalP07 = count( $tabP07 );
 }
 
 if (tableMois("aout",$mysqli)) {
  $requete = "SELECT * FROM aout;";
  $tabP08 = lectureAll( $mysqli, $requete );
  $totalP08 = count( $tabP08 );
 }
 
 if (tableMois("septembre",$mysqli)) {
  $requete = "SELECT * FROM septembre;";
  $tabP09 = lectureAll( $mysqli, $requete );
  $totalP09 = count( $tabP09 );
 }
 
 if (tableMois("octobre",$mysqli)) {
  $requete = "SELECT * FROM octobre;";
  $tabP10 = lectureAll( $mysqli, $requete );
  $totalP10 = count( $tabP10 );
 }
 
 if (tableMois("novembre",$mysqli)) {
  $requete = "SELECT * FROM novembre;";
  $tabP01 = lectureAll( $mysqli, $requete );
  $totalP11 = count( $tabP11 );
 }
 
 if (tableMois("decembre",$mysqli)) {
  $requete = "SELECT * FROM decembre;";
  $tabP11 = lectureAll( $mysqli, $requete );
  $totalP11 = count( $tabP11 );
 }

 //-> Appel de la vue
 require_once 'vuePropositions.php';
 ?>