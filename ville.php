<?php
require_once ('include/inc_connexion.php');

if (isset ($_GET['key']))
{
$id = strip_tags($_GET['key']); //protection contre les injections XSS

$result = $bdd -> prepare('SELECT id,villes_nom, ville_texte FROM villes WHERE id=?') or die (print_r($bdd -> errorInfo()));
$result -> execute (array($id));
$row = $result -> fetch ();

$identifiant = $row['id'];

	if(isset ($identifiant))//vérifie que l'id est bien dans la table
	{

	$nom = $row['villes_nom'];
	$texte = $row['ville_texte'];
	
	}
	else 
	{
	?><p><a href="index.php"><?php echo 'Retour à la page d\'accueil';?></a></p><?php
	exit;
	}
}
else
{
?><p><a href="index.php"><?php echo 'Retour à la page d\'accueil';?></a></p><?php
	exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"/>
<title><?php echo $nom;?></title>
<link rel="stylesheet" href="css/style.css" media="screen" />
</head>
<body>
<div id="wrapper">
<div id="titre_site">
<h1><?php echo $nom; ?></h1>
</div>
<section>
<p><?php echo $texte; ?></p>
</section>
<menu>
<?php require_once ('include/inc_menu.php'); ?>
</menu>
</div>
</body>
</html>