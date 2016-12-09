<?php








	function array_median($array) {
  // perhaps all non numeric values should filtered out of $array here?
  $iCount = count($array);
  if ($iCount == 0) {
    throw new DomainException('Median of an empty array is undefined');
  }
  // if we're down here it must mean $array
  // has at least 1 item in the array.
  $middle_index = floor($iCount / 2);
  sort($array, SORT_NUMERIC);
  $median = $array[$middle_index]; // assume an odd # of items
  // Handle the even case by averaging the middle 2 items
  if ($iCount % 2 == 0) {
    $median = ($median + $array[$middle_index - 1]) / 2;
  }
  return $median;
}
	mysql_connect("localhost", "pmagnaldo", "nire40ji");
	mysql_select_db("pmagnaldo");
	$moy = mysql_query("select E.NOM_ENTREPRISE, E.NUMERO_ENTREPRISE, count(*)/4 as MOYENNE_STAGE
	from STAGE S inner join ENTREPRISE E on E.NUMERO_ENTREPRISE=S.NUMERO_ENTREPRISE
	WHERE DATE_ADD(S.DATE_DEBUT, INTERVAL 4 YEAR)>NOW()
	group by S.NUMERO_ENTREPRISE order by MOYENNE_STAGE desc;");
	$don = "select EN.NOM_ENTREPRISE, EN.NUMERO_ENTREPRISE, sum(T.MONTANT) as TAXES_PAYEES
from ENTREPRISE EN inner join TAXE T on EN.NUMERO_ENTREPRISE=T.NUMERO_ENTREPRISE
group by EN.NOM_ENTREPRISE 
order by TAXES_PAYEES desc";
	$don_r = mysql_query($don);
	
	$tab = array();
	$i=0;
	while ($eur = mysql_fetch_array($don_r)){
		
		$tab[$i]=$eur['TAXES_PAYEES'];
		$i++;
	}
	
	$med = array_median($tab);
	echo $med;
	mysql_data_seek($don_r,0); 
	
	
	
	/*$top = mysql_query('select * from ENTREPRISE E
	inner join TAXE T on EN.NUMERO_ENTREPRISE=T.NUMERO_TAXE where T.;');
	//echo $top;*/
	while ($eur = mysql_fetch_assoc($don_r)){
		
		echo '<td>'.'<br>';
		echo $eur['NUMERO_ENTREPRISE'];
		echo "    ";
		echo $eur['NUMERO_ENTREPRISE'].'<br>';
		echo '</td>'; 
	}

	echo $eur['TAXES_PAYEES'].'<br>';
	
?>
