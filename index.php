<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Blog</title>
	</head>
	<body>
		<?php require_once('Config/config.php'); ?>
		<?php //include("Vues/commentaires.php"); ?>
		<?php //require("Vues/pagePrincipale.php"); ?>
		<?php //require("scriptAfficherParPage.php"); ?>
		<?php //require("Tests/tests.php"); ?>
		<?php //require("Vues/creerNews.php") ?>
		<?php //require_once("Controleurs/AdminControleur.php");
		require_once("Controleurs/UserControleur.php");
		//$AdminC=new AdminControleur();
		$UserC = new UserControleur();
		?>

	</body>
</html>
