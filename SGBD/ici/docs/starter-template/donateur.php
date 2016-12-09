
<?php









	mysql_connect("localhost", "pmagnaldo", "nire40ji");
	mysql_select_db("pmagnaldo");
	$req = mysql_query("select EN.NOM_ENTREPRISE, sum(T.MONTANT) as TAXES_PAYEES
	from ENTREPRISE EN inner join TAXE T on EN.NUMERO_ENTREPRISE=T.NUMERO_TAXE
	group by EN.NOM_ENTREPRISE 
	order by TAXES_PAYEES desc;");
	

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

