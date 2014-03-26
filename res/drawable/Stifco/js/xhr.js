// JavaScript Document

//-> Traitement des appels asynchrones
function XHR( code, item1, item2 ) {
 var xhr = null;

 switch ( code ) {
  //-> POST spécial pour la visualisation
  //-| item1 donne le numéro de page
  //-| item2 donne le nom du script
  case 0: donnees = "menu="+item1;
          chemin = "";
          nomScript = item2;
          break;
  //-> POST spécifique pour l'envoi d'un enregistrement 
  //-| item1 donne le nom du formulaire
  //-| item2 donne le nom du script
  case 1: nbr = document.getElementById( item1 ).length-2;
          valeur = 0;
          donnees = "";
 
          for (i=0;i<=nbr;i++) {
           valeur = document.getElementById( item1 )[i].value;
           donnees = donnees + "v" + i + "=" + valeur;
           if ( i<nbr ) { donnees = donnees + "&" };
          }

          chemin = "library/";
          nomScript = item2;
          break;
  //-> POST spécial pour l'envoi d'une recherche 
  //-| item1 n'est pas utilisé
  //-| item2 donne le nom du script
  case 2: laGare = document.getElementById("gare");
          gare = laGare.options[laGare.selectedIndex].value;
          leMois = document.getElementById("mois");
          mois = leMois.options[leMois.selectedIndex].value;

          chemin = "";
          donnees = "menu=6&gare=" + gare + "&" + "mois=" + mois;
          nomScript = item2;
          break;

 }
 
 //-> Création de l'objet XHR
 if ( window.XMLHttpRequest ) { xhr = new XMLHttpRequest(); } else {
  if ( window.ActiveXObject ) { 
   try {
    xhr = new ActiveXObject( "Msxml2.XMLHTTP" );
   } catch ( e ) {
      xhr = new ActiveXObject( "Microsoft.XMLHTTP" );
     }
  } else { 
     alert( "Votre navigateur ne supporte pas les objets XMLHTTPRequest..." ); 
     xhr = false; 
    }
 }
 
 //-> Attente des résultats en asynchrone 
 xhr.onreadystatechange = function() {
  if ( xhr.readyState==4 ) {
   if ( xhr.status==200 ) {
    reponse = xhr.responseText;
    //-> Retour avec affichage eventuel d'un message puis retour sur la page principale
    // alert( reponse );
    
    if ( reponse > 0 ) {
     switch ( reponse ) {
      case "1" : alert( "Insertion bien effectuée." );     
                 break;
      case "2" : alert( "Cette adresse email est déjà enregistrée ! " );
                 break;
      case "3" : alert( "Proposition bien enregistrée, merci." );     
                 break;

      case "9" : alert( " Une erreur est survenue, désolé..." );
                 break;
     }
    }
    
    document.location.href = "index.php";
   } else {
      alert(xhr.status);   
    } 
  }
 }
 
 //-> Gestion de l'envoi
 xhr.open( "POST", "./core/"+chemin+nomScript+".php",true );
 xhr.setRequestHeader( "Content-Type","application/x-www-form-urlencoded" );
 xhr.send( donnees );
}
