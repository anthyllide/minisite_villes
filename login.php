<?php require_once ('include/inc_connexion.php'); 
session_start();

// vérification : utilisateur connecté ou pas
if (isset($_SESSION ['user_login']))
{
header ('location:admin/admin.php');
exit;
}
else
{

//verification bouton valider ok ou pas
	if (isset ($_POST['submit_form']))
	{
	// Récupération des variables : on retire les chevrons html
	$user_input_login = strip_tags ($_POST['user_input_login']);
	$user_input_password = strip_tags ($_POST['user_input_password']);
	
		// test variables vide
		if ((empty($user_input_login)) OR (empty($user_input_password)))
		{
		echo 'Veuillez entrer votre login et votre mot de passe.';
		}
		else
		{
		// Extraction du login dans la table user
		$rep = $bdd -> prepare ('SELECT user_login, user_password FROM user WHERE user_login =?');
		$rep -> execute (array($user_input_login));
		$row = $rep -> fetch();
	
			// vérification de l'existence du login
			if (!isset ($row['user_login']))
			{
			echo 'Ce login est inconnu.';
			}
			else
			{
			//récupération des champs user_login et user_password
			$user_login = $row['user_login'];
			$user_password = $row['user_password'];
			
			$rep -> closeCursor ();

				// comparaison des mots de passe 
				if (crypt($user_input_password, $user_password) != $user_password)
				{
				echo 'Le mot de passe saisi est incorrect.';
				}
				else
				{
				session_start();
				$_SESSION ['user_login'] = $user_login;
				header ('location:admin/admin.php');
				exit;
				}
			}
		}
	}
	elseif (isset ($_POST['registration_form']))
	{
	$user_registration_login = strip_tags($_POST['user_registration_login']);
	$user_registration_password = strip_tags($_POST['user_registration_password']);
	
		if ((empty($user_registration_login)) OR (empty($user_registration_password)))
		{
		echo 'Veuillez entrer votre login et votre mot de passe.';
		}
		else
		{
		// requete verification existence user_login
		$rep = $bdd -> prepare ('SELECT user_login, user_password FROM user WHERE user_login =?');
		$rep -> execute (array($user_registration_login));
		$row = $rep -> fetch();
		
		$user_login = $row['user_login'];
		
			if(isset($user_login))
			{
			echo 'Le login saisi existe déjà.';
			}
			else
			{
			$crypt_password = crypt($user_registration_password);
	
			$rep = $bdd -> prepare ('INSERT INTO user (user_login, user_password) VALUES (:user_registration_login , :crypt_user_registration_password)');
	
			$rep -> execute (array (
							'user_registration_login' => $user_registration_login,
							'crypt_user_registration_password' => $crypt_password
							));	
			
			$rep -> closeCursor ();
			
			$reponse = $bdd -> prepare('SELECT user_login FROM user WHERE user_login=?');
			$reponse -> execute (array($user_registration_login));
			
			$row = $reponse -> fetch();
			
			$user_login = $row['user_login'];
			
			$reponse -> closeCursor ();
			
				if (!isset($user_login))
				{
				echo 'Ce login n\'existe pas.';
				}
				else
				{
				session_start();
				$_SESSION ['user_login'] = $user_login;
				header('location:admin/admin.php');
				exit;
				}
			}
		}
	}
}
?>

<! DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"/>
<title>Login</title>
<link rel="stylesheet" href="css/style.css" media="screen" />
</head>
<body>

<div id="titre_admin">
<h1>Identification</h1>
</div>

<section>
<h2>Déjà inscrit</h2>
<form action="login.php" method="post">
<p><label for="login">Votre login :</label><input type="text" name="user_input_login" id="login" /></p>
<p><label for="password">Votre mot de passe :</label><input type="password" name="user_input_password" id="password" /></p>
<p><input type="submit" name="submit_form" value="valider" /></p>
</form>
<hr />
<h2>Nouveau utilisateur</h2>
<form action="login.php" method="post">
<p><label for="login">Votre login :</label><input type="text" name="user_registration_login" id="login" /></p>
<p><label for="password">Votre mot de passe :</label><input type="password" name="user_registration_password" id="password" /></p>
<p><input type="submit" name="registration_form" value="enregistrer" /></p>
</form>
</section>

</body>
</html>