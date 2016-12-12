<?php
mysql_connect("localhost", "pmagnaldo", "nire40ji");
mysql_select_db("pmagnaldo");
if (isset($_POST['sujet'])){
	$ins = 'insert into STAGE values ("", "'.$_POST['entreprise'].'", "'.$_POST['contact'].'", "'.$_POST['sujet'].'", "'.$_POST['date_debut'].'", "'.$_POST['date_fin'].'")';
	mysql_query($ins) or die ('Erreur SQL !'.$ins.'<br />'.mysql_error());
	$numero_insere = mysql_insert_id();
	$ins_tag = 'insert into DESCRIPTION_STAGE values ("'.$_POST['tag'].'","'.$numero_insere.'")';
	mysql_query($ins_tag) or die ('Erreur SQL !'.$ins_tag.'<br />'.mysql_error());
	$ins_eleve = 'insert into DESCRIPTION_STAGIAIRE values ("'.$numero_insere.'","'.$_POST['eleve'].'")';
	mysql_query($ins_eleve) or die ('Erreur SQL !'.$ins_tag.'<br />'.mysql_error());

}
 header('Location: https://pmagnaldo.vvvpedago.enseirb-matmeca.fr/SGBD/ici/docs/starter-template/index.html#stage');
 exit();
?>

