<?php require_once ('include/inc_connexion.php'); ?>
<?php require_once ('include/inc_stat.php'); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"/>
<title>Page d'accueil</title>
<link rel="stylesheet" href="css/style.css" media="screen" />
<body>

<div id="wrapper">
<div id="titre_site">
<h1>Accueil</h1>
</div>
<section>

<article>
<p>Bienvenue sur le mini site des villes.</p>
<p>Ce site utilise PHP et MySQL.</p>
<p>Utilisez le menu de navigation pour consulter les pages du site.</p>
<p>Bonne visite !</p>
</article>

<div id="search_form">
<form action="search.php" method="post">
<p><input type="text" value="rechercher une ville..." name="search" id="search" /><input type="submit" name="search_submit" id="search_submit" value=""/></p>
</form>
</div>

</section>
<menu>
<?php require_once ('include/inc_menu.php'); ?>
</menu>

</div>

</body>
</html>