<?php
mysql_connect("localhost", "pmagnaldo", "nire40ji");
mysql_select_db("pmagnaldo");
if (isset($_POST['nom'])){
	$ins = 'insert into ENTREPRISE values ("", "'.$_POST['nom'].'", "'.$_POST['adresse'].'", "'.$_POST['code'].'","'.$_POST['ville'].'", "'.$_POST['tel'].'","'.$_POST['site'].'","'.$_POST['nbr'].'") ';
	mysql_query($ins) or die ('Erreur SQL !'.$ins.'<br />'.mysql_error());;
	$numero_insere = mysql_insert_id();
	$ins2 = 'insert into DESCRIPTION_ENTREPRISE values ("'.$numero_insere.'", "'.$_POST['genre'].'")';
	mysql_query($ins2) or die ('Erreur SQL !'.$ins2.'<br />'.mysql_error());
	echo '<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="Refresh" CONTENT="0">"';
}
 header('Location: https://pmagnaldo.vvvpedago.enseirb-matmeca.fr/SGBD/ici/docs/starter-template/index.html#entreprise');
 exit();
?>

