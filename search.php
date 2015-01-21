<?php
session_start(); 
require_once ('include/inc_connexion.php');

//vérification si le $_POST existe

if (isset ($_POST['search_submit'])) 
{
$search_ville = strip_tags($_POST['search']);//protection contre les injections XSS

	// test de la variable $_POST
	
	if (empty ($search_ville))
	{
	$message_error = 'Veuillez entrer le nom d\'une ville SVP.';
	}
	else
	{
		//  Cas des utilisateurs connectés (on utilise le $_SESSION pour les identifier)
		
		if (isset($_SESSION['user_login']))
		{
		$userLogin = $_SESSION['user_login'];
		
		//recuperation du user_id de l'utulisateur dans la table user
		
		$rep2 = $bdd -> prepare ('SELECT user_id FROM user WHERE user_login=?');
		$rep2 -> execute (array($userLogin));
		$row2 = $rep2 -> fetch();
			
		$userID = $row2['user_id'];
			
		$rep2 -> closeCursor();
		
		require ('include/inc_search.php');
		
		}
		else
		{
		
			// cas des utilisateur non connectés (création d'un cookie valable 3 mois)
			if (!isset ($_COOKIE['userID']))
			{
			$userID = uniqid();
		
			setcookie('userID', $userID, time()+ 7776000);
			
			require ('include/inc_search.php');
		
			}
			else
			{
			
			$userID = $_COOKIE ['userID'];
			
			require ('include/inc_search.php');
			
			}
		
		} 
		
	}

}

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
<h1>Vos recherches</h1>
</div>

<?php 
if (isset ($message_error))
{
?>
<p class="error"><?php echo $message_error; ?></p>
<?php
}
else
{
?>
<h3 id="result">Ville(s) correspondante(s) à votre recherche :</h3>

<ul class="list_search">
<?php
if (isset($search_result))
{
	foreach ($search_result as $key => $value)
	{
	?>
	<li><a href="ville.php?key=<?php echo $key; ?>"><?php echo $value; ?></a></li>
	<?php
	}
	?>
</ul>
<?php
}
else
{
?>
<p class="error"><?php echo 'Il n\'existe pas de villes correspondantes à votre recherche.'; ?></p>
<?php
}
?>

<h4 id="last_searches">Vos dernières recherches :</h4>

<ul class="list_search">
<?php 
if (isset($result_history))
{
	foreach ($result_history as $key => $value)
	{
	?>
	<li><a href="ville.php?key=<?php echo $key;?>"><?php echo $value; ?></a></li>
	<?php
	};
?>
</ul>
<?php
}
else
{
?>
<p class="error"><?php echo 'Vous n\'avez pas encore effectué de recherches.'; ?></p>
<?php
}
}
?>


<menu id="menu">
<?php require_once ('include/inc_menu.php'); ?>
</menu>

</div>
</body>
</html>