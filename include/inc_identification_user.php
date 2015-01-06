<?php 
session_start();

if (!isset($_SESSION['user_login']))
{
echo 'Vous n\'avez pas les droits d\'accés à cette page.';
?>
<p><a href="../index.php"><?php echo 'Retour à la page d\'accueil.'; ?></a></p>
<?php
exit;
}
else
{
$user_login = strip_tags ($_SESSION['user_login']);


$rep = $bdd -> prepare ('SELECT user_login FROM user WHERE user_login =?');
$rep -> execute (array($user_login));

$row = $rep -> fetch();

	if (!isset($row['user_login']))
	{
	echo 'Vous n\'avez pas les droits d\'accés à cette page.';
	?>
	<p><a href="../index.php"><?php echo 'Retour à la page d\'accueil.'; ?></a></p>
	<?php
	exit;
	}
}
?>
