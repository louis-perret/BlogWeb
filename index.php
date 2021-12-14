<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Blog</title>
	</head>
	<body>
		<?php require_once('Config/config.php'); ?>
		<?php require_once('Config/Autoload.php');
			Autoload::charger();?>		
		<?php 
			session_start(); //lance une session
			if(!isset($_COOKIE['nbCom'])){ //Si l'utilisateur n'a pas de cookie 'nbCom'
				setcookie('nbCom',0,time()+365*24*3600); //On le crée avec 0 comme valeur par défaut
			}
			
			new FrontControleur();
		?>

	</body>
</html>
