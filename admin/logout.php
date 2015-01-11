<?php
session_start();
session_unset();
session_destroy();
header ('location:../index.php');
exit;
?>
<! DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8"/>
<title>Logout</title>
<link rel="stylesheet" href="../css/style.css" media="screen" />
</head>
<body>
</body>
</html>