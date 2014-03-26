
<form id="cxion">
  
 <table class="user" border="0" cellpadding="3" cellspacing="3">
  <tr>
   <th>
    <label class="user"><h2>Formulaire d'enregistrement</h2></label>
   </th> 
  </tr>     	
  <tr>
   <td class="user">
    <br />
    Nom&nbsp;&nbsp;<input type="text" maxlength="20" size="23" id="nom" value="" />
    &nbsp;Pr&eacute;nom&nbsp;&nbsp;<input type="text" maxlength="20" size="23" id="prenom" value="" />
    <br />
   </td>
  </tr>
  <tr>
   <td class="user">
    <br />
    Adresse&nbsp;&nbsp;<input type="text" maxlength="50" size="53" id="adresse" value="" /><br /><br />
    Ville&nbsp;&nbsp;<input type="text" maxlength="36" size="39" id="ville" value="" />
    &nbsp;Code postal&nbsp;&nbsp;<input type="text" maxlength="7" size="10" id="codepostal" value="" />
    <br />
   </td>
  </tr>
  <tr>
   <td class="user">
    <br />
    E-mail&nbsp;&nbsp;<input type="text" maxlength="42" size="45" id="email" value="" />
    <br />
   </td>
  </tr>
  <tr>
   <td class="user">
    <input class="envoi" type="button" onclick="XHR(1,'cxion','insertion');" value="Enregistrement dans la base" />
   </td>
  </tr>
 </table>
 
</form>
  