<?php
	require_once("Config/Connexion.php");

	//Pour passer de l'un à l'autre, passer true à false
	if(true){ //Pour louis
		$login="root";
		$password="";
		$dsn="mysql:host=localhost;dbname=bdblog";
	}

	else{ //Pour Jules
		$login="root";
		$password="";
		$dsn="mysql:host=localhost;dbname=bdblog";
	}

	$tabErreur=[];
	try{
		$c = new Connexion($dsn,$login,$password);
	}
	catch(PDOException $e){
		$tabErreur[]='Problème de connexion à la base de données';
		include('Vues/erreur.php');
	}

?>