<?php require_once ('../include/inc_connexion.php'); ?>
<! DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"/>
<title>Liste</title>
<link rel="stylesheet" href="../css/style.css" media="screen" />
</head>
<body>
<div id="titre_liste">
<h2>Liste des villes :</h2>
</div>
<?php
$result = $bdd -> query ('SELECT id, villes_nom FROM villes') or die (print_r($bdd->errorInfo()));

while ($row = $result -> fetch()) 
{
$villes[$row['id']] = $row['villes_nom'];
}
$result -> closeCursor();
?>
<div id="menu_liste">
<ul>
<?php
foreach ($villes as $key => $value)
{?>
<li>
<a href="../ville.php?key=<?php echo $key?>"><?php echo $value ?></a>
<a href="edition.php?key=<?php echo $key?>">[editer]</a>
<a href="suppression.php?key=<?php echo $key?>">[supprimer]</a>
</li>
<?php
}
?>
</ul>
</div>
</body>
</html>