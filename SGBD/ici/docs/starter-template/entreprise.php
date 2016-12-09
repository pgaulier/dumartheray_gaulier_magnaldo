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

</html>	

