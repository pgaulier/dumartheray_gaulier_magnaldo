
<?php









	mysql_connect("localhost", "pmagnaldo", "nire40ji");
	mysql_select_db("pmagnaldo");
	$req = mysql_query("select P.NOM, P.PRENOM, P.ADRESSE, P.TELEPHONE, P.MEL, C.FONCTION from PERSONNE P, CONTACT C
	where P.ID_PERSONNE = C.ID_CONTACT;");

	
	$tab=array();
	$i=0;
	while ($eur = mysql_fetch_assoc($req)){
		
		$tab[$i]=$eur;
		$i++;
	}

	
?>
<html>
	<table>
		<thead>
			<tr>
				<th><?php echo implode('</th><th>', array_keys(current($tab))); ?></th>
			</tr>
		</thead>
			<tbody>
				<?php foreach ($tab as $row): array_map('htmlentities', $row); ?>
					<tr>
						<td><?php echo implode('</td><td>', $row); ?></td>
					</tr>
				<?php endforeach; ?>
		</tbody>
		
	</table>

</html>	


<?php
//formulaire d'ajout

$eve=mysql_query("select * from EVENEMENT");
$ent=mysql_query("select * from ENTREPRISE");
$eco=mysql_query("select * from ECOLE");

?>
<form action="contact_ajout.php" method="post">
 <p>Nom du contact: <input type="text" name="nom" /></p>
 <p>Prénom du contact: <input type="text" name="prenom" /></p>
 <p>Entreprise :<select name="entreprise">
	<?php 
	while ($don = mysql_fetch_assoc($ent)){
	echo "<option value='".$don['NUMERO_ENTREPRISE']."'>".$don['NOM_ENTREPRISE']."</option>\n";
	}
   ?>
   </select>
   
  <p>Evenement :<select name="evenement">
	<?php 
	while ($don = mysql_fetch_assoc($eve)){
	echo "<option value='".$don['NUMERO_EVENEMENT']."'>".$don['NOM']."</option>\n";
	}
   ?>
   </select>
</p>
  <p>Ecole :<select name="ecole">
	<?php 
	while ($don = mysql_fetch_assoc($eco)){
	echo "<option value='".$don['NUMERO_ECOLE']."'>".$don['NOM']."</option>\n";
	}
   ?>
   </select>
</p>			
 <p>Adresse : <input type="text" name="adresse" /></p>
 <p>Telephone : <input type="text" name="telephone" /></p>
 <p>Mel : <input type="text" name="mel" /></p>
 <p>Fonction : <input type="text" name="fonction" /></p>
 <p><input type="submit" value="OK"></p>
 
 
</form>
</html>	






