<?php









	mysql_connect("localhost", "pmagnaldo", "nire40ji");
	mysql_select_db("pmagnaldo");
	$req = mysql_query("select S.SUJET, T.DESCRIPTION,  S.DATE_DEBUT, S.DATE_FIN, P.NOM as NOM_ELEVE
	 from STAGE S, PERSONNE P, TAG T, DESCRIPTION_STAGE DS, DESCRIPTION_STAGIAIRE D, ELEVE E
	where S.NUMERO_STAGE=D.NUMERO_STAGE and D.ID_ELEVE=E.ID_ELEVE and E.ID_ELEVE=P.ID_PERSONNE
	and S.NUMERO_STAGE = DS.NUMERO_STAGE and DS.NUMERO_TAG = T.NUMERO_TAG;");
	
	
	/*$top = mysql_query('select * from ENTREPRISE E
	inner join TAXE T on EN.NUMERO_ENTREPRISE=T.NUMERO_TAXE where T.;');
	//echo $top;*/
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

$ta=mysql_query("select * from TAG");
$ent=mysql_query("select * from ENTREPRISE");
$cont=mysql_query("select C.ID_CONTACT, P.NOM, P.PRENOM from CONTACT C, PERSONNE P where C.ID_CONTACT=P.ID_PERSONNE");
$ele=mysql_query("select E.ID_ELEVE, P.NOM, P.PRENOM from ELEVE E, PERSONNE P where E.ID_ELEVE=P.ID_PERSONNE");
?>
<form action="stage_ajout.php" method="post">
 <p>Sujet : <input type="text" name="sujet" /></p>
 <p>Date début : <input type="date" name="date_debut" /></p>
 <p>Date fin: <input type="date" name="date_fin" /></p>
 <p>Entreprise :<select name="entreprise">
	<?php 
	while ($don = mysql_fetch_assoc($ent)){
	echo "<option value='".$don['NUMERO_ENTREPRISE']."'>".$don['NOM_ENTREPRISE']."</option>\n";
	}
   ?>
   </select>
</p>
<p>Tag :<select name="tag">
	<?php 
	while ($don = mysql_fetch_assoc($ta)){
	echo "<option value='".$don['NUMERO_TAG']."'>".$don['DESCRIPTION']."</option>\n";
	}
   ?>
   </select>
</p>
<p>Eleve :<select name="eleve">
	<?php 
	while ($don = mysql_fetch_assoc($ele)){
	echo "<option value='".$don['ID_ELEVE']."'>".$don['NOM']." ".$don['PRENOM']."</option>\n";
	}
   ?>
   </select>
</p>
<p>Contact :<select name="contact">
	<?php 
	while ($don = mysql_fetch_assoc($cont)){
	echo "<option value='".$don['ID_CONTACT']."'>".$don['NOM']." ".$don['PRENOM']."</option>\n";
	}
   ?>
   </select>
</p>

 <p><input type="submit" value="OK"></p>
</form>
</html>	





