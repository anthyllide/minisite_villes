<?php require_once ('../include/inc_connexion.php'); ?>
<! DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8"/>
<title>Administration du site</title>
<link rel="stylesheet" href="../css/style.css" media="screen" />
</head>
<body>
<div id="wrapper">

<div id="titre_admin">
<h1>Administration du mini site des villes</h1>
</div>

<section>
<p>L'administration du site vous permet d'ajouter une nouvelle ville au site ou de modifier ou supprimer une ville existante.</p>
</section>

<menu>
<?php require_once ('inc_menu_admin.php'); ?>
</menu>

<div id="inc_liste">
<?php require_once ('liste.php');?>
</div>

</div>
</body>
</html>