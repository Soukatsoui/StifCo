<?php
 //-> Définition du chemin général des scripts de l'application par une constante
 defined('CHEMIN') || define('CHEMIN',realpath(dirname(__FILE__).'/core'));
 
 //-> Mise en place des répertoires dédiés dans l'include_path de PHP
 set_include_path(CHEMIN.PATH_SEPARATOR.
                  CHEMIN.'/controller'.PATH_SEPARATOR.
                  CHEMIN.'/library'.PATH_SEPARATOR.
                  CHEMIN.'/view'.PATH_SEPARATOR.                  
                  CHEMIN.'/model'.PATH_SEPARATOR.get_include_path());

 //-> Autochargement des classes par la fonction __autoload spécifique PHP5+
 function __autoload($nomClasse) {
  require_once $nomClasse.'.php';
 }

 //-> Configuration de l'application
 require_once 'configuration.php';

 //-> Démarrage de la session
 session_name('stifco');
 session_start();
 
 //-> Par défaut, la page est l'accueil
 $page = 0;

 //-> Cas d'une demande de visualisation
 if ( isset($_SESSION['page'])) {
  $page = $_SESSION['page'];
 }
 
  //-> Récupération de l'URL du chemin racine 
 $http  = $_SERVER['HTTP_HOST'];
 $uri   = rtrim( dirname($_SERVER['PHP_SELF']),'/\\');
 $home = "http://".$http.$uri;

 //-> Lancement de la vue de la page globale
 require_once 'main.php';
 ?>
