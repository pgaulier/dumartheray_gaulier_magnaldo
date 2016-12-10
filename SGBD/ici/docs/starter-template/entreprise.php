<?php









	mysql_connect("localhost", "pmagnaldo", "nire40ji");
	mysql_select_db("pmagnaldo");
	$req = mysql_query("select E.NUMERO_ENTREPRISE, E.NOM_ENTREPRISE, G.TYPE_GENRE,  E.ADRESSE, E.CODE_POSTAL, E.VILLE_SIEGE, E.TELEPHONE, E.SITE_INTERNET, E.NOMBRE_EMPLOYES 
	from ENTREPRISE E, GENRE G, DESCRIPTION_ENTREPRISE DE
	where E.NUMERO_ENTREPRISE = DE.NUMERO_ENTREPRISE
	and DE.NUMERO_GENRE = G.NUMERO_GENRE;");
	
	
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


<?php
//formulaire d'ajout

$rep=mysql_query("select * from GENRE");
?>
<form action="entreprise_ajout.php" method="post">
 <p>Nom de l'entreprise : <input type="text" name="nom" /></p>
 
 <p> Genre de l'entreprise :<select name="genre">
	<?php 
	
	while ($don = mysql_fetch_assoc($rep)){
	echo "<option value='".$don['NUMERO_GENRE']."'>'".$don['TYPE_GENRE']."'</option>\n";
	}
   ?>
   </select>
</p>
 <p>Adresse de l'entreprise : <input type="text" name="adresse" /></p>
 <p>Code postal : <input type="text" name="code" /></p>
 <p>Ville : <input type="text" name="ville" /></p>
 <p>Téléphone : <input type="text" name="tel" /></p>
 <p>Site internet : <input type="text" name="site" /></p>
 <p>Nombre d'employés : <input type="text" name="nbr" /></p>
 <p><input type="submit" value="OK"></p>
</form>
</html>	



