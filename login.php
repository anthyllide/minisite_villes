<?php require_once ('include/inc_connexion.php'); 
session_start();

if (isset($_SESSION ['user_login']))
{
header ('location:admin/admin.php');
exit;
}
else
{

	if (isset ($_POST['submit_form']))
	{
	$user_input_login = $_POST['user_input_login'];
	$user_input_password = $_POST['user_input_password'];
	
		if ((empty($user_input_login)) OR (empty($user_input_password)))
		{
		echo 'Veuillez entrer votre login et votre mot de passe.';
		}
		else
		{
		$rep = $bdd -> prepare ('SELECT user_login, user_password FROM user WHERE user_login =?');
		$rep -> execute (array($user_input_login));
		$row = $rep -> fetch();
	
			if (!isset ($row['user_login']))
			{
			echo 'Ce login est inconnu.';
			}
			else
			{
			$user_login = $row['user_login'];
			$user_password = $row['user_password'];
		
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
<form action="login.php" method="post">
<p><label for="login">Votre login :</label><input type="text" name="user_input_login" id="login" /></p>
<p><label for="password">Votre mot de passe :</label><input type="password" name="user_input_password" id="password" /></p>
<p><input type="submit" name="submit_form" value="valider" /></p>
</form>
</section>

</body>
</html>