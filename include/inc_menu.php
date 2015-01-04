<?php
$result = $bdd -> query ('SELECT id, villes_nom FROM villes') or die (print_r($bdd->errorInfo()));

while ($row = $result -> fetch()) 
{
$villes[$row['id']] = $row['villes_nom'];
}
$result -> closeCursor();
?>
<ul>
<li><a href="index.php" title="Accueil">Accueil</a></li>
<?php
foreach ($villes as $key => $value)
{?>
<li><a href="ville.php?key=<?php echo $key?>"><?php echo $value ?></a></li>
<?php
}
?>
</ul>
