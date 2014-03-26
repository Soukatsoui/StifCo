
   <form id="cxion">
  
    <table class="user" border="0" cellpadding="3" cellspacing="3">
     <tr>
      <th>
       <label class="user"><h2>Formulaire de test de recherche</h2></label>
      </th> 
     </tr>     	
     <tr>
      <td class="user">
       <br />
       Gare&nbsp;&nbsp;
       <select name="gare" id="gare">
       <?php
         for ($i=0;$i<count($tabGares);$i++) {
          print("<option value='".$tabGares[$i]->{'fields'}->{'nom_de_la_gare'}."'>".$tabGares[$i]->{'fields'}->{'nom_de_la_gare'}."</option>");  
         }
        ?>
       <br />
      </td>
     </tr>
     <tr>
      <td class="user">
       <br />
       Mois&nbsp;&nbsp;
       <select name="mois" id="mois">     
        <option value="janvier">Janvier</option>  
        <option value="fevrier">F&eacute;vrier</option>   
        <option value="mars">Mars</option>  
        <option value="avril">Avril</option>   
        <option value="mai">Mai</option>  
        <option value="juin">Juin</option>   
        <option value="juillet">Juillet</option>  
        <option value="aout">Ao&ucirc;t</option>   
        <option value="septembre">Septembre</option>  
        <option value="octobre">Octobre</option>   
        <option value="novembre">Novembre</option>  
        <option value="decembre">D&eacute;cembre</option>
       </select>
 
       <br /><br />
       <br />
      </td>
     </tr>
     <tr>
     <tr>
      <td class="user">
       <input class="envoi" type="button" onclick="XHR(2,'','dispatch');" value=" Voir le fichier JSON r&eacute;sultant " />
      </td>
     </tr>
    </table>
   </form>
