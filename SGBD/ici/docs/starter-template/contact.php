
<?php









	mysql_connect("localhost", "pmagnaldo", "nire40ji");
	mysql_select_db("pmagnaldo");
	$req = mysql_query("select * from PERSONNE P, CONTACT C
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
