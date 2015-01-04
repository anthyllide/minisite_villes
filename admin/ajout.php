<?php require_once ('../include/inc_connexion.php'); ?>
<! DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8"/>
<title>Ajout</title>
<link rel="stylesheet" href="../css/style.css" media="screen" />
</head>
<body>
<?php
if (isset ($_POST['valider']))
{
//protections des variables
$ville_nom = strip_tags($_POST['ville_nom']);
$ville_texte = strip_tags($_POST['ville_texte']);
$pays_id = strip_tags($_POST['pays_id']);

	if ((empty ($ville_nom)) OR (empty ($ville_texte)) OR (empty($pays_id)))
	{
	echo 'Vous devez saisir le nom d\'une ville et son texte de description.';
	}
	else
	{
	$rep = $bdd -> prepare ('SELECT count(id) FROM villes WHERE villes_nom=?') OR die (print_r($bdd->errorInfo()));
	$rep -> execute (array($ville_nom));
	$row = $rep -> fetch();
	if ($row[0]>0)
		{
		echo 'La ville que vous avez saisi existe déjà.';
		}
		else 
		{
		
		$result = $bdd -> prepare ('INSERT INTO villes (villes_nom, ville_texte, pays_id) VALUES (:ville_nom,:ville_texte, :pays_id)') OR die (print_r($bdd->errorInfo()));
		$result -> execute (array(
								'ville_nom'=> $ville_nom,
								'ville_texte'=>$ville_texte,
								'pays_id' => $pays_id
								));
	if ($result == true)
		{
		echo 'L\'ajout de la ville '.$ville_nom.' a été effectuée.';
		}
		else
		{
		echo 'L\'ajout de la ville '.$ville_nom.' n\'est pas effectuée.';
		}
	}
	}
}

// requête table pays

$rep = $bdd -> query ('SELECT pays_id, pays_nom FROM pays');

while ($row = $rep -> fetch())
{
$pays_liste[$row['pays_id']]=$row['pays_nom'];
}
$rep -> closeCursor();

?>
<div id="wrapper">

<div id="titre_admin">
<h1>Ajouter une ville</h1>
</div>
<section>
<form action="ajout.php" method="post">
<p><label for="nom_ville">Entrez le nom de la ville :</label><input type="text" name="ville_nom" id="nom_ville" /></p>
<p>Entrez le texte de présentation :<br />
<textarea name="ville_texte" id="ville_texte" cols="30" rows="10"></textarea></p>
<p><input type="submit" name="valider" value="Valider"/></p>

<div id="choix_pays">
<?php

foreach ($pays_liste as $pays_id => $pays_nom)
{
	
	?>
	<p><input type="radio" name="pays_id" value="<?php echo $pays_id;?>"/><?php echo $pays_nom; ?></p>
	
	<?php
	
}
?>
</div>
</form>

</section>
<menu>
<?php require_once ('inc_menu_admin.php'); ?>
</menu>
</div>
</body>
</html>