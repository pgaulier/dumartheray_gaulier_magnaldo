<?php









	mysql_connect("localhost", "pmagnaldo", "nire40ji");
	mysql_select_db("pmagnaldo");
	$req = mysql_query("select S.SUJET, T.DESCRIPTION,  S.DATE_DEBUT, S.DATE_FIN, P.NOM as NOM_CONTACT
	 from STAGE S, CONTACT C, PERSONNE P, TAG T, DESCRIPTION_STAGE DS
	where S.ID_CONTACT=C.ID_CONTACT and C.ID_CONTACT=P.ID_PERSONNE
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

