<meta charset="utf-8" />
<?php 
if (isset($_POST['requete']) && $_POST['requete'] != NULL && isset($_POST['table']) && $_POST['table'] != NULL)
{
		mysql_connect("localhost", "pmagnaldo", "nire40ji");
		mysql_select_db("pmagnaldo");
		$requete = htmlspecialchars($_POST['requete']);
		switch($_POST['table'])
		{
			case "PERSONNE":
				$info = array('NOM', 'PRENOM', 'ADRESSE', 'TELEPHONE', 'MEL');
				break;
			case "ELEVE":
				$info = array('NOM', 'PRENOM', 'ADRESSE', 'TELEPHONE', 'MEL', 'NUMERO_ECOLE', 'DEPARTEMENT', 'ANNEE_ETUDE', 'PROMO');
				break;
			case "CONTACT":
				$info = array('NOM', 'PRENOM', 'ADRESSE', 'TELEPHONE', 'MEL', 'NUMERO_EVENEMENT', 'FONCTION');
				break;
			case "ENTREPRISE":
				$info = array('NOM_ENTREPRISE', 'ADRESSE','CODE_POSTAL', 'VILLE_SIEGE', 'TELEPHONE', 'NOMBRE_EMPLOYES');
				break;
			case "ECOLE":
				$info = array('NOM', 'TELEPHONE', 'ADRESSE');
				break;
		}
		$nb_resultats = 0;
		$global_query = array();
		foreach ($info as $donnee)
		{
			$req = "select * from ".$_POST['table']." where ".$donnee." like '".$_POST['requete']."';";
			$query = mysql_query($req);
			$nb_resultats += mysql_num_rows($query);
			array_push($global_query, $query);
		}	

		
		if ($nb_resultats != 0)
		{
			?>
			<h2>Résultats de votre recherche.</h2>
			<p>Nous avons trouvé <?php echo $nb_resultats;
			if ($nb_resultats > 1) {echo ' résultats.';} else  {echo ' résultat.';} ?></p>
			
			<?php
			$tab=array();
			$i=0;
			foreach ($global_query as $loc_query)
			{
				while ($eur = mysql_fetch_assoc($loc_query))
				{
					$tab[$i]=$eur;
					$i++;
				}
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
		<form action="index.html" method="Post">
		<input type="submit" value="Revenir au menu">
		</form>
		<?php

		}
		else 
		{
		?>
			<h2>Pas de résultats.</h2>
			<?php
		}
		mysql_close();
		
}
else
{
	?>
	<h2>Faire une recherche:</h2>
	<form action="recherche.php" method="Post">
		<p>Catégorie:
		<select name="table">
			<option value="PERSONNE">Personne</option>
			<option value="CONTACT">Contact</option>
			<option value="ELEVE">Elève</option>
			<option value="ENTREPRISE">Entreprise</option>
			<option value="ECOLE">Ecole</option>
		</select></p>
		<p><input type="text" name="requete" size="30"></p>
		<input type="submit" value="Rechercher">
		</form>
	<?php
}
?>		
		
		
		
