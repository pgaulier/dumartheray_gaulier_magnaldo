
<?php









	mysql_connect("localhost", "pmagnaldo", "nire40ji");
	mysql_select_db("pmagnaldo");
	$req = mysql_query("select T.DESCRIPTION, count(DS.NUMERO_STAGE) as NOMBRE_STAGES
	from TAG T left outer join DESCRIPTION_STAGE DS on T.NUMERO_TAG=DS.NUMERO_TAG
	group by T.NUMERO_TAG, T.DESCRIPTION
	order by NOMBRE_STAGES desc; ");
	
	
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

