<?php
 //-> Gestion de l'exception
 function Erreur( $e ) {
  //-> Redirection vers la page d'accueil avec un message d'impossibilité
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim( dirname( dirname( $_SERVER['PHP_SELF'] )), '/\\');
  die( $e );
  header( 'Location: http://'.$host.$uri.'/index.php?erreur=9' );   
 }
 
  //-> Execution d'une requete de type DELETE/INSERT/UPDATE avec retour de statut 
 function operation( $m, $rqut ) {
  $rslt = $m->query( $rqut ) or Erreur( 'operation'.$m->error );    
  return $rslt;
 }

 //-> Lecture complête d'une table avec retour dans un tableau 
 function lectureALL( $m, $rqut ) {
  $tab = false;
  $rslt = $m->query( $rqut ) or Erreur( 'lectureALL'.$m->error );    
  $nb = $rslt->num_rows;

  if ( $nb >= 0 ) { 
   for ( $i=0; $i<$nb; $i++ ) {
    $ligne = $rslt->fetch_assoc();  
    $tab[$i] = $ligne;
   }
  } 

  //-> Liberation des resultats
  $rslt->free_result();   
       
  return $tab; 
 }
 
  //-> Lecture d'une ligne avec retour dans un tableau associatif ou indexe suivant le type demande
 function lectureOne( $m, $rqut, $type ) {
  $lgn = false;
  $rslt = $m->query( $rqut ) or Erreur( 'lectureOne : ' );    
  
  if ( $type==0 ) {
   $tb = $rslt->fetch_row();   	
  } else {
     $tb = $rslt->fetch_assoc(); 
   } 
  
  //-> Liberation des resultats
  $rslt->free_result();   
  
  return $tb;
 }     

 
 //-> Objet SQL
 class DB {
  private $_connection;
  private static $_instance; //The single instance

  // Get an instance of the Database
  public static function getInstance() {
   if ( !self::$_instance ) { // If no instance then make one
    self::$_instance = new self();
   }
  
   return self::$_instance;
  }
 
  // Constructor
  private function __construct() {
   $this->_connection = new mysqli( "localhost", "root", "", "stifco" ); //En local
   $this->_connection = new mysqli( "localhost", "Id", "MDP", "DB Name (identique à l'Id" ); // Sur chamedu.fr
   // Error handling
   if ( mysqli_connect_error() ) {
    Erreur( "Failed to conencto to MySQL: " . mysql_connect_error(),E_USER_ERROR ); 
   }
  }
 
  // Magic method clone is empty to prevent duplication of connection
  private function __clone() { }
 
  // Get mysqli connection
  public function getConnection() {
   return $this->_connection;
  }
 }

 //-> Initialisation de la connexion à la base de données
 $sql = DB::getInstance();
 ?>
