<?php require_once ('../include/inc_connexion.php'); ?>
<?php require ('../include/inc_identification_user.php');?>
<! DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8"/>
<title>Liste des pays</title>
<link rel="stylesheet" href="../css/style.css" media="screen" />
</head>
<body>

<div id="wrapper">

<?php
if(isset ($_GET['suppr']))
{
$pays_id = $_GET['suppr'];

$reponse = $bdd -> prepare('DELETE FROM pays WHERE pays_id=?');
$reponse -> execute (array($pays_id));

	if ($reponse == true)
	{
	echo 'Le pays a bien été supprimé.';
	}
	else
	{
	echo 'La suppression a échouée.';
	}
}

elseif (isset ($_GET['key']))
{
$pays_id = $_GET['key'];

$rep = $bdd -> prepare ('SELECT villes_nom FROM villes WHERE pays_id=? ORDER BY villes_nom');

$rep -> execute (array($pays_id));

while ($row= $rep -> fetch())
{
$nom_ville = $row ['villes_nom'];

?>
<ul>
<li><?php echo $nom_ville; ?></li>
</ul>
<?php
}

$rep -> closeCursor ();

}
else
{
$rep = $bdd -> query ('
SELECT p.pays_id, p.pays_nom
FROM pays p
INNER JOIN villes v
ON p.pays_id = v.pays_id 
GROUP BY pays_nom
ORDER BY pays_nom');

?>

<div id="titre_admin">
<h1>Liste des pays</h1>
</div>

<section>
<?php
while ($row = $rep -> fetch())
{
$pays_nom = $row ['pays_nom'];
$pays_id = $row ['pays_id'];
?>

<ul>
<li><a href="pays.php?key=<?php echo $pays_id; ?>"><?php
echo $pays_nom;
?></a>&nbsp;<a href="pays.php?suppr=<?php echo $pays_id; ?>">[supprimer]</a>
</li>
</ul>
<?php
}
}
?>
</section>

<menu>
<?php require_once ('inc_menu_admin.php'); ?>
</menu>

</div>
</body>
</html>