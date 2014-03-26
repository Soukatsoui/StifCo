<?php
 //-> Récupération du fichier JSON 
 $url = "http://www.chamedu.fr/~stifco/gares.json";
 $json = json_decode(file_get_contents($url));
 $tabGares = $json->{'gares'};
 sort($tabGares);
    
 //-> Appel de la vue
 require_once 'vueRecherche.php';
 ?>