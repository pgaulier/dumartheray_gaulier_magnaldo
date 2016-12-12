
<?php









	mysql_connect("localhost", "pmagnaldo", "nire40ji");
	mysql_select_db("pmagnaldo");
	$req = mysql_query("select T.NUMERO_TAXE, T.MONTANT, T.ANNEE_VERSEMENT, E.NOM_ENTREPRISE 
	from TAXE T, ENTREPRISE E
	where T.NUMERO_ENTREPRISE=E.NUMERO_ENTREPRISE; ");
	
	
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

$rep=mysql_query("select * from ENTREPRISE");
?>
<form action="taxe_ajout.php" method="post">
 <p>Montant : <input type="text" name="montant" /></p>
 
 <p> Entreprise :<select name="nom">
	<?php 
	
	while ($don = mysql_fetch_assoc($rep)){
	echo "<option value='".$don['NUMERO_ENTREPRISE']."'>'".$don['NOM_ENTREPRISE']."'</option>\n";
	}
   ?>
   </select>
</p>
 <p>Année versement : <input type="text" name="annee" /></p>
 <p><input type="submit" value="OK"></p>
</form>
</html>	
