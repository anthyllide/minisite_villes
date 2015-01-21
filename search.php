<?php
session_start(); 
require_once ('include/inc_connexion.php');

if (isset ($_POST['search_submit']))
{
$search_ville = strip_tags($_POST['search']);

	if (empty ($search_ville))
	{
	$message_error = 'Veuillez entrer le nom d\'une ville SVP.';
	}
	else
	{
		//  Utilisateurs connectés 
		if (isset($_SESSION['user_login']))
		{
		$userLogin = $_SESSION['user_login'];
		
		//recuperation du user_id de l'utilisateur dans la table user
		$rep2 = $bdd -> prepare ('SELECT user_id FROM user WHERE user_login=?');
		$rep2 -> execute (array($userLogin));
		$row2 = $rep2 -> fetch();
			
		$userID = $row2['user_id'];
			
		$rep2 -> closeCursor();
		
		// requete recherche de la ville ds tables villes
		$rep = $bdd -> prepare ('SELECT id, villes_nom FROM villes WHERE villes_nom LIKE ?') or die (print_r($bdd->errorInfo()));
		$rep -> execute (array('%'.$search_ville.'%'));
		
		$nb_rows = $rep -> rowCount(); //méthode qui compte le nb de lignes 
		
			if ($nb_rows > 0)
			{
				while ($row = $rep -> fetch())
				{
				$search_result [$row['id']] = $row ['villes_nom'];
				
				}
			
			$rep -> closeCursor();
			
			// boucle foreach pour récuper les ville_id
			
			foreach ($search_result as $key => $value)
			{
			$resultID = $key;
			
			$regist = $bdd -> prepare ('INSERT INTO user_search (userID, resultID) VALUES (:userID, :resultID)');
			$regist -> execute (array(
									'userID' => $userID,
									'resultID' => $resultID
									));
			}
			
			$regist -> closeCursor();
			
			}
			
			//affichage de l'historique de recherche
			$history = $bdd -> prepare ('
			SELECT v.villes_nom ville, s.resultID resultID
			FROM villes v
			INNER JOIN user_search s
			ON s.resultID = v.id
			WHERE s.userID = ?
			GROUP BY ville
			ORDER BY ville
			') or die(print_r($bdd->errorInfo()));
			
			$history -> execute (array($userID));
			
				while ($history_row = $history -> fetch())
				{
				$result_history [$history_row['resultID']] = $history_row['ville'];
				}
			
			$history -> closeCursor();	
		}
		else
		{
			if (!isset ($_COOKIE['userID']))
			{
			$userID = uniqid();
		
			setcookie('userID', $userID, time()+ 7776000);
			
		// requete recherche de la ville ds tables villes
		$rep = $bdd -> prepare ('SELECT id, villes_nom FROM villes WHERE villes_nom LIKE ?') or die (print_r($bdd->errorInfo()));
		$rep -> execute (array('%'.$search_ville.'%'));
		
		$nb_rows = $rep -> rowCount(); //méthode qui compte le nb de lignes 
		
				if ($nb_rows > 0)
				{
					while ($row = $rep -> fetch())
					{
					$search_result [$row['id']] = $row ['villes_nom'];
				
					}
			
				$rep -> closeCursor();
				
				// boucle foreach pour récuper les ville_id
			
			foreach ($search_result as $key => $value)
			{
			$resultID = $key;
			
			$regist = $bdd -> prepare ('INSERT INTO user_search (userID, resultID) VALUES (:userID, :resultID)');
			$regist -> execute (array(
									'userID' => $userID,
									'resultID' => $resultID
									));
			}
			
			$regist -> closeCursor();
			
				}
			}
			else
			{
			
			$userID = $_COOKIE ['userID'];
			
			
			// requete recherche de la ville ds tables villes
		$rep = $bdd -> prepare ('SELECT id, villes_nom FROM villes WHERE villes_nom LIKE ?') or die (print_r($bdd->errorInfo()));
		$rep -> execute (array('%'.$search_ville.'%'));
		
		$nb_rows = $rep -> rowCount(); //méthode qui compte le nb de lignes 
		
			if ($nb_rows > 0)
			{
				while ($row = $rep -> fetch())
				{
				$search_result [$row['id']] = $row ['villes_nom'];
				
				}
			
			$rep -> closeCursor();
			
			// boucle foreach pour récuper les ville_id
			
			foreach ($search_result as $key => $value)
			{
			$resultID = $key;
			
			$regist = $bdd -> prepare ('INSERT INTO user_search (userID, resultID) VALUES (:userID, :resultID)');
			$regist -> execute (array(
									'userID' => $userID,
									'resultID' => $resultID
									));
			}
			
			$regist -> closeCursor();
			
			}
			}
			
			//affichage de l'historique de recherche
			$history = $bdd -> prepare ('
			SELECT v.villes_nom ville, s.resultID resultID
			FROM villes v
			INNER JOIN user_search s
			ON s.resultID = v.id
			WHERE s.userID = ?
			GROUP BY ville
			ORDER BY ville
			') or die(print_r($bdd->errorInfo()));
			
			$history -> execute (array($userID));
			
				while ($history_row = $history -> fetch())
				{
				$result_history [$history_row['resultID']] = $history_row['ville'];
				}
			
			$history -> closeCursor();	
			
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


<menu>
<?php require_once ('include/inc_menu.php'); ?>
</menu>

</div>
</body>
</html>