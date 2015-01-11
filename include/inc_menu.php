<?php
$result = $bdd -> query ('SELECT id, villes_nom FROM villes') or die (print_r($bdd->errorInfo()));

while ($row = $result -> fetch()) 
{
$villes[$row['id']] = $row['villes_nom'];
}
$result -> closeCursor();
?>
<div id="connexion">
<?php
if (isset ($_SESSION['user_login']))
{
$message = 'Bonjour '.$_SESSION['user_login'];

?>
<p><?php echo $message; ?></p>
<p><a title ="Déconnexion" href="admin/logout.php">Déconnexion</a></p>
<p><a href="admin/admin.php">Administration</a></p>
<?php
}
else
{
?>
<p><a title ="Connexion" href="login.php">Connexion</a></p>
<?php
}
?>
</div>

<div id="menu_site">
<ul>
<li><a href="index.php" title="Accueil"><strong>Accueil</strong></a></li>
<?php
foreach ($villes as $key => $value)
{?>
<li><a href="ville.php?key=<?php echo $key?>"><?php echo $value ?></a></li>

<?php
}
?>
</ul>
</div>