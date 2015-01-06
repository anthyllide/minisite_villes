<?php require_once ('include/inc_connexion.php'); ?>

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
<p>Bienvenue sur le mini site des villes.</p>
<p>Ce site utilise PHP et MySQL.</p>
<p>Utilisez le menu de navigation pour consulter les pages du site.</p>
<p>Bonne visite !</p>
</section>
<menu>
<?php require_once ('include/inc_menu.php'); ?>
</menu>
<div id="acces_admin">
<ul>
<li><a href="login.php">Administration</a></li>
</ul>
</div>
</div>
</body>
</html>