<?php
mysql_connect("localhost", "pmagnaldo", "nire40ji");
mysql_select_db("pmagnaldo");
if (isset($_POST['montant'])){
	$ins = 'insert into TAXE values ("", "'.$_POST['nom'].'", "'.$_POST['montant'].'", "'.$_POST['annee'].'")';
	mysql_query($ins) or die ('Erreur SQL !'.$ins.'<br />'.mysql_error());
}
 header('Location: https://pmagnaldo.vvvpedago.enseirb-matmeca.fr/SGBD/ici/docs/starter-template/index.html#taxe');
 exit();
?>

