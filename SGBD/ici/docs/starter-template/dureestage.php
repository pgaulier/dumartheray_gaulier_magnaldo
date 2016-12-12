
<?php









	mysql_connect("localhost", "pmagnaldo", "nire40ji");
	mysql_select_db("pmagnaldo");
	$req = mysql_query("select E.DEPARTEMENT, avg(DATEDIFF(S.DATE_FIN,S.DATE_DEBUT)) as DUREE_MOYENNE_JOURS
	from (ELEVE E inner join DESCRIPTION_STAGIAIRE DS on DS.ID_ELEVE=E.ID_ELEVE) inner join STAGE S on DS.NUMERO_STAGE=S.NUMERO_STAGE
	group by E.DEPARTEMENT;");
	
	
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

