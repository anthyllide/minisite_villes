<?php
try {
$bdd = new PDO ('mysql:host=localhost; dbname=projet_villes_site', 'root', '');
$bdd->exec("SET NAMES 'UTF8'");
}
catch (Exception $e)
{
die ('Erreur : '.$e -> getMessage());
}
