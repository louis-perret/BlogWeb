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
			new FrontControleur();
		?>

	</body>
</html>
