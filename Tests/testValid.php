<?php
	require_once("/home/IUT/juduteyrat/Documents/php/Config/validation.php");
	$valid = new validation();
	$login = "6bon";
	$valid->validationLogin($login);
	$login = "mau vais";
	$valid->validationLogin($login);
	$titre = "ceci est un bon titre";
	$valid->validationTitre($titre);
	$titre = "ceci est un *mauvais* titre";
	$valid->validationTitre($titre);
	$news = "voici une news innocente";
	$valid->validationContenu($news);
	$news = "<title>titre</title>";
	$valid->validationContenu($news);
?>