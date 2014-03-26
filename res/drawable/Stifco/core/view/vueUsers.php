
<table class="user" border="0" cellpadding="3" cellspacing="3">
 <tr>
  <th class="user">Email</th>
  <th class="user">Nom</th>
  <th class="user">Pr&eacute;nom</th>
  <th class="user">Adresse</th>
  <th class="user">Ville</th>
  <th class="user">Code postal</th>
 </tr>
 <?php for ($i=0;$i<$totalUsers;$i++): ?>
 <tr>
  <td class="user">&nbsp;<?php print($tabUsers[$i]['email']); ?>&nbsp;</td>
  <td class="user">&nbsp;<?php print($tabUsers[$i]['nom']); ?>&nbsp;</td>
  <td class="user">&nbsp;<?php print($tabUsers[$i]['prenom']); ?>&nbsp;</td>
  <td class="user">&nbsp;<?php print($tabUsers[$i]['adresse']); ?>&nbsp;</td>
  <td class="user">&nbsp;<?php print($tabUsers[$i]['ville']); ?>&nbsp;</td>
  <td class="user">&nbsp;<?php print($tabUsers[$i]['codepostal']); ?>&nbsp;</td>
 </tr> 
 <?php endfor; ?>       
</table> 
<br />
     