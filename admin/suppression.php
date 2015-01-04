<?php require_once ('../include/inc_connexion.php'); ?>
<! DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"/>
<title>suppression</title>
<link rel="stylesheet" href="../css/style.css" media="screen" />
</head>
<body>
<?php
$count = $bdd -> query ('SELECT id, villes_nom FROM villes');
while ($row = $count -> fetch ())
{
$table[$row['villes_nom']]=$row['id'];
}

$count ->closeCursor();

if ((isset ($_GET['key'])) AND (in_array($_GET['key'],$table)))
{
$id = htmlspecialchars($_GET['key']);

$result = $bdd -> prepare ('DELETE FROM villes WHERE id=?');
$result -> execute(array($id));
	if ($result)
	{
	echo 'La suppression a été effectuée.';
	}
	else
	{
	'La suppression a échoué.';
	}
}
else
{
echo 'Erreur lors de la suppression.';
}
?>
<menu>
<?php require_once ('inc_menu_admin.php'); ?>
</menu>
</body>
</html>