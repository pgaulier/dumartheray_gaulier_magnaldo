<?php
	mysql_connect("localhost", "pmagnaldo", "nire40ji");
	mysql_select_db("pmagnaldo");
	$moy = mysql_query("select E.NOM_ENTREPRISE, E.NUMERO_ENTREPRISE, count(*)/4 as MOYENNE_STAGE
	from STAGE S inner join ENTREPRISE E on E.NUMERO_ENTREPRISE=S.NUMERO_ENTREPRISE
	WHERE DATE_ADD(S.DATE_DEBUT, INTERVAL 4 YEAR)>NOW()
	group by S.NUMERO_ENTREPRISE order by MOYENNE_STAGE desc;");



	while ($eur = mysql_fetch_assoc($moy)){
		
		echo '<td>'.'<br>';
		echo $eur['NOM_ENTREPRISE'];
		echo "    ";
		echo $eur['MOYENNE_STAGE'].'<br>';
		

		echo '</td>'; 
	}
		
 echo "Yop je suis une pomme et FFXV c'est nul";
?>
