<?php

if (!isset ($_COOKIE['visite']))
{
$web_user_id = uniqid();
$nombre_visite = 1;

// construction de l'array user_stat

$user_stat ['web_user_id'] = $web_user_id;
$user_stat ['web_user_visit'] = $nombre_visite;
 
// serialisation pour enregister les données de $user_stat dans cookie

$stat_data= serialize ($user_stat);

// ajout dans la table stat 

$rep = $bdd -> prepare ('INSERT INTO stat (web_user_id, web_user_visit) VALUES (:web_user_id, :nombre_visite)');
$rep -> execute (array (
						'web_user_id' => $web_user_id,
						'nombre_visite' => $nombre_visite
						));
						
$rep -> closeCursor();

setcookie ('visite', $stat_data, time() + 259200);						
}
else
{
$cookie_value = $_COOKIE['visite'];
$cookie_value = unserialize ($cookie_value);

$web_user_id = $cookie_value['web_user_id'];
$web_user_visit = $cookie_value['web_user_visit'];

//mise à jour du nombre de visite

$cookie_value['web_user_visit'] = $cookie_value['web_user_visit'] + 1;

$stat_data = serialize($cookie_value);

$rep= $bdd -> prepare ('UPDATE stat SET web_user_visit = :web_user_visit WHERE web_user_id = :web_user_id');
$rep -> execute (array (
						'web_user_visit' => $web_user_visit,
						'web_user_id' => $web_user_id
						));

$rep -> closeCursor ();

setcookie ('visite', $stat_data, time() + 259200); 

}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"/>
<title>Page d'accueil</title>
<link rel="stylesheet" href="css/style.css" media="screen" />
<body>

</body>
</html>