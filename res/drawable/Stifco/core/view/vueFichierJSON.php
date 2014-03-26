<?php if ( $sortie ): ?>
 <h2>Contenu du fichier JSON qui sera envoy&eacute; au smartphone :</h2>
 
 <?php
   $varJson = json_encode( $tabResultat );
   $varJson = "{\"propositions\":".$varJson."}";
   
   print( "<br /><p>".$varJson."</p>" );
  ?>
 
<?php else: ?>

 <h2>La recherche ne donne aucun résultat...</h2>
<?php endif; ?> 
