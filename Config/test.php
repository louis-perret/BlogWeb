<?php
	$login = "6bon";
	require("validationLogin.php");
	$login = "mau vais";
	require("validationLogin.php");
	$titre = "ceci est un bon titre";
	$news = "voici une news innocente";
	require("validationNews.php");
	$titre = "ceci est un *mauvais* titre";
	$news = "<title>titre</title>";
	require("validationNews.php");
?>