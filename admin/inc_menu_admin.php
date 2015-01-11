
<?php
if (isset ($_SESSION['user_login']))
{
$message = 'Bonjour '.$_SESSION['user_login'];

?>
<div id="connexion">
<p><?php echo $message; ?></p>
<p><a title ="Déconnexion" href="logout.php">Déconnexion</a></p>
</div>
<?php
}
?>
<div id="menu_admin">
<ul>
<li><a href="admin.php">Accueil administration</a></li>
<li><a href="ajout.php">Ajouter une ville</a></li>
<li><a href="pays.php">Voir les pays</a></li>
<li><a href="../stat.php">Voir les stats</a></li>
<li><a href="../index.php">Voir le site</a></li>
</ul>
</div>