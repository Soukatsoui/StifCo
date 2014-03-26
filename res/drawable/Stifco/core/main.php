<!DOCTYPE html>
<html lang="fr">

<head>
 <meta charset="utf-8">
  <title>StifCo</title>
  <link rel="stylesheet" href="./design/main.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="./design/fonts.css" type="text/css" media="screen" />
  <script type="text/javascript" src="./js/xhr.js"></script> 
 </head>

 <body>
  <header>
   <h2>Site de test pour l'application <span style="color: #880000">Android StifCo</span></h2>
   <?php if ($page>1): ?>
     <input class="envoi" type="button" onclick="XHR(0,1,'dispatch');" value="Retour &agrave; la page d'accueil" />
   <?php endif; ?>
  </header>
  
  <article>
  <?php
   switch ($page) {
    case 1:  require_once 'accueil.php';
             break;
    case 2:  require_once 'users.php';
             break;
    case 3:  require_once 'enregistrement.php';
             break;
    case 4:  require_once 'propositions.php';
             break;
    case 5:  require_once 'rechercheWeb.php';
             break;
    case 6:  require_once 'rechercheJSON.php';
             break;
             
    default: require_once 'accueil.php';
    break;		
   }
   ?>
   <br />
  </article>
  
  <footer>
    <div id="copyright">
     &copy; BTS Services Informatiques aux Organisations - 2014 | 
     <a href="http://www.vinci-melun.org/">Lyc&eacute;e L&eacute;onard de Vinci</a> MELUN 77
    </div> 
  </footer>
 </body>
</html>

