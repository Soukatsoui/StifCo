<?php
 //-> Positionnement de l'affichage des erreurs
 //-| Mode développement
 ini_set( "display_errors", 1 );
 //-| Mode production
 //-| ini_set( "display_errors", 0 );

 error_reporting( E_ALL );
 
 //-> Configuration du fuseau horaire et de la locale
 date_default_timezone_set( 'UTC' );
 setlocale( LC_TIME, "fr_FR" );
