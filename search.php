<?php
session_start(); 
require_once ('include/inc_connexion.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"/>
<title>Page recherche</title>
<link rel="stylesheet" href="css/style.css" media="screen" />
</head>
<body>
<div id="wrapper">
<div id="titre_site">
<h1>Résultats</h1>
</div>
<h3>Les résultats correspondants à xxx sont :</h3>
<ul>
<li><!-- liste des ville avec lien vers la page ville -->
</ul>
<h4>Villes déjà recherchées :</h4>
<ul>
<li>
</ul>
<menu>
<?php require_once ('include/inc_menu.php'); ?>
</menu>
</div>
</body>
</html>