<?php require_once ('../include/inc_connexion.php'); ?>
<?php require ('../include/inc_identification_user.php');?>
<! DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8"/>
<title>Ajout Pays</title>
<link rel="stylesheet" href="../css/style.css" media="screen" />
</head>
<body>
<?php
if (isset ($_POST['valider']))
{
//protections des variables
$pays_nom = strip_tags($_POST['pays_nom']);

	if (empty ($pays_nom))
	{
	echo 'Vous devez saisir le nom d\'un pays.';
	}
	else
	{
	$rep = $bdd -> prepare ('SELECT count(pays_id) AS pays_existe FROM pays WHERE pays_nom=?') OR die (print_r($bdd->errorInfo()));
	$rep -> execute (array($pays_nom));
	$row = $rep -> fetch();
	
	if ($row['pays_existe']>0)
		{
		echo 'La pays que vous avez saisi existe déjà.';
		}
		else 
		{
		
		$result = $bdd -> prepare ('INSERT INTO pays (pays_nom) VALUES (?)') OR die (print_r($bdd->errorInfo()));
		$result -> execute (array($pays_nom));
		
			if ($result == true)
			{
			echo 'L\'ajout du pays '.$pays_nom.' a été effectuée.';
			}
			else
			{
			echo 'L\'ajout du pays '.$pays_nom.' n\'est pas effectuée.';
			}
		}
	}
}


?>
<div id="wrapper">

<div id="titre_admin">
<h1>Ajouter un pays</h1>
</div>
<section>

<form action="ajout_pays.php" method="post">
<p><label for="pays_nom">Entrez un pays :</label><input type="text" name="pays_nom" id="pays_nom" /></p>
<p><input type="submit" name="valider" value="Valider"/></p>
</form>

</section>
<menu>
<?php require_once ('inc_menu_admin.php'); ?>
</menu>
</div>
</body>
</html>