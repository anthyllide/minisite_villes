<?php require_once ('../include/inc_connexion.php'); ?>
<! DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8"/>
<title>edition</title>
<link rel="stylesheet" href="../css/style.css" media="screen" />
</head>
<body>
<div id=wrapper">
<?php
if (isset ($_POST['valider']))
{
$ville_nom = strip_tags($_POST['ville_nom']);
$ville_texte = strip_tags($_POST['ville_texte']);
$ville_id = $_POST['ville_id'];
$pays_id = $_POST['pays_id'];

	if ((empty($ville_nom)) OR (empty($ville_texte)) OR (empty($pays_id)))
	{
	echo 'Vous devez saisir le nom d\'une ville, son texte et le pays.';
	}
	else
	{
	$rep = $bdd -> prepare ('UPDATE villes SET villes_nom = :ville_nom, ville_texte= :ville_texte, pays_id=:pays_id WHERE id=:ville_id');
	$rep -> execute (array (
							'ville_nom' => $ville_nom,
							'ville_texte' => $ville_texte,
							'pays_id'=> $pays_id,
							'ville_id' => $ville_id
							));
	if ($rep)
		{
		echo 'La mise à jour a bien été effectuée.';?>
		
		<menu>
		<?php require_once ('inc_menu_admin.php'); ?>
		</menu>
		<?php
		exit;
		}
		else
		{
		echo 'La mise à jour de la ville '.$ville_nom.' a échouée.';
		exit;
		}
	}
}

// récupération du texte initial

$id = strip_tags($_GET['key']);

$rep = $bdd -> prepare ('SELECT id, villes_nom, ville_texte, pays_id FROM villes WHERE id=?');
$rep -> execute (array($id));
$row = $rep -> fetch();

$nom = $row['villes_nom'];
$texte = $row['ville_texte'];
$ville_pays_id = $row['pays_id'];

$rep -> closeCursor();

// requête table pays

$rep = $bdd -> query ('SELECT pays_id, pays_nom FROM pays');

while ($row = $rep -> fetch())
{
$pays_liste[$row['pays_id']]=$row['pays_nom'];
}
$rep -> closeCursor();

?>
<div id="titre_admin">
<h1>Modifier une ville</h1>
</div>
<section>

<form action="edition.php" method="post">

<p><label for="ville_nom">Nom de la ville : </label><input type="text" name="ville_nom" id="ville_nom" value="<?php echo $nom; ?>"/></p>
<p><label for="texte">Texte de présentation : </label><br />
<textarea name="ville_texte" id="texte" cols="32" rows="8"><?php echo $texte; ?></textarea></p>
<input type="hidden" name="ville_id" value="<?php echo $id; ?>" />
<p><input id="valider" type="submit" name="valider" value="valider"/></p>

<?php
?>
<div id="choix_pays">
<?php

foreach ($pays_liste as $pays_id => $pays_nom)
{
	if ($ville_pays_id == $pays_id)
	{
	?>
	<p><input checked="checked" type="radio" name="pays_id" value="<?php echo $pays_id;?>"/><?php echo $pays_nom; ?></p>
	<?php
	}
	else
	{
	?>
	<p><input type="radio" name="pays_id" value="<?php echo $pays_id;?>"/><?php echo $pays_nom; ?></p>
	
	<?php
	}
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