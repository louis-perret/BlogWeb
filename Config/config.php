<?php
	require_once("../DAL/Connexion.php");

	//Pour passer de l'un à l'autre, passer true à false
	if(true){ //Pour louis
		$login="root";
		$password="_Moomoo/259";
		$dsn="mysql:host=localhost;dbname=bdblog";
	}

	else{ //Pour Jules
		$login="juduteyrat";
		$password="JeanMutilation_2";
		$dsn="mysql:host=berlin/localhost;dbname=bdjuduteyrat";
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
