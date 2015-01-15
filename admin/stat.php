<?php require_once ('../include/inc_connexion.php'); ?>
<?php require ('../include/inc_identification_user.php');?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"/>
<title>Statistiques</title>
<link rel="stylesheet" href="../css/style.css" media="screen" />
</head>
<body>
<?php
$rep = $bdd -> query ('SELECT stat_id, web_user_id,web_user_visit FROM stat ORDER BY web_user_visit DESC');

while ($donnees = $rep -> fetch())
{
$table_stat[$donnees['stat_id']]['web_user_id']= $donnees['web_user_id'];
$table_stat [$donnees['stat_id']]['web_user_visit']= $donnees ['web_user_visit'];
}

$rep -> closeCursor();

$rep = $bdd -> query ('SELECT count(web_user_id) AS nombre_visiteurs FROM stat');
$row = $rep -> fetch ();

$nb_visiteur = $row['nombre_visiteurs'];

$rep -> closeCursor ();

$rep = $bdd -> query('SELECT SUM(web_user_visit) AS nombre_visites FROM stat');
$row = $rep -> fetch();

$nb_visite = $row['nombre_visites'];

?>
<div id="wrapper">
<div id="titre_admin">
<h1>Statistiques des visites</h1>
</div>
<section>
<p>Nombre total de visiteur :<?php echo $nb_visiteur ?></p>
<p>Nombre total de visites :<?php echo $nb_visite ?></p>
<div id="table_stat">
<table>
<thead>
<tr>
<th>Internaute ID</th>
<th>Internaute visite</th>
</tr>
</thead>
<tbody>
<?php foreach ($table_stat as $value)
{
?>
<tr>

<td><?php echo $value ['web_user_id']; ?></td>
<td><?php echo $value ['web_user_visit']; ?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</section>
<menu>
<?php require_once ('inc_menu_admin.php'); ?>
</menu>
</div>
</body>
</html>