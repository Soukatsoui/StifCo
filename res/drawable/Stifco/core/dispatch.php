<?php
 $page = $_POST['menu'];

 session_name('stifco');
 session_start();

 $_SESSION['page'] = $page;

 if ( $page == 6 ) {
  $_SESSION['gare'] = $_POST['gare'];
  $_SESSION['mois'] = $_POST['mois'];
 }
 
 echo "ok";
 ?>