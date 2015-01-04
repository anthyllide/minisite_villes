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

	if ((empty($ville_nom)) OR (empty($ville_texte)))
	{
	echo 'Vous devez saisir le nom d\'une ville et son texte.';
	}
	else
	{
	$rep = $bdd -> prepare ('UPDATE villes SET villes_nom = :ville_nom, ville_texte= :ville_texte WHERE id=:ville_id');
	$rep -> execute (array (
							'ville_nom' => $ville_nom,
							'ville_texte' => $ville_texte,
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

$rep = $bdd -> prepare ('SELECT id, villes_nom, ville_texte FROM villes WHERE id=?');
$rep -> execute (array($id));
$row = $rep -> fetch();

$nom = $row['villes_nom'];
$texte = $row['ville_texte'];

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
<p><input type="submit" name="valider" value="valider"/></p>

</form>

</section>

<menu>
<?php require_once ('inc_menu_admin.php'); ?>
</menu>

</div>
</body>
</html>