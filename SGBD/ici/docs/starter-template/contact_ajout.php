<?php
mysql_connect("localhost", "pmagnaldo", "nire40ji");
mysql_select_db("pmagnaldo");
if (isset($_POST['nom'])){
	$ins4 = 'insert into PERSONNE values ("","'.$_POST['nom'].'","'.$_POST['prenom'].'","'.$_POST['adresse'].'","'.$_POST['telephone'].'","'.$_POST['mel'].'")';
	mysql_query($ins4) or die ('Erreur SQL !'.$ins4.'<br />'.mysql_error());
	$numero_insere = mysql_insert_id();
	$ins = 'insert into CONTACT values ("'.$numero_insere.'", "'.$_POST['evenement'].'", "'.$_POST['fonction'].'")';
	mysql_query($ins) or die ('Erreur SQL !'.$ins.'<br />'.mysql_error());;
	
	$ins2 = 'insert into DESCRIPTION_CONTACT values ("'.$_POST['entreprise'].'","'.$numero_insere.'")';
	mysql_query($ins2) or die ('Erreur SQL !'.$ins2.'<br />'.mysql_error());
	$ins3 = 'insert into LIAISON_ECOLE values ("'.$_POST['ecole'].'","'.$numero_insere.'")';
	mysql_query($ins3) or die ('Erreur SQL !'.$ins3.'<br />'.mysql_error());

	
	echo '<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="Refresh" CONTENT="0">"';
}
 header('Location: https://pmagnaldo.vvvpedago.enseirb-matmeca.fr/SGBD/ici/docs/starter-template/index.html#contact');
 exit();
?>

