<?php

	//Sera mis dans un contrôleur plus tard
	require_once('Config/config.php');
	require_once('DAL/NewsGateway.php');
	require_once('Config/Validation.php');

	$nbNews_par_Page=10;
	$totalNews=0;

	try{
		$newsGateway=new NewsGateway($c);
		$totalNews=$newsGateway->getNbNews(); //On récupère le nombre de news total dans la base
		$nbPagesMax=ceil($totalNews/$nbNews_par_Page); //On calcul le nombre de pages totales possibles

		$b=false;
		if(isset($_GET['page'])){
			$numPage=$_GET['page'];
			$b=Validation::verifierPage($numPage,$nbPagesMax);
		}
		if(!$b){ //Si le numéro est incorrecte
			$numPage=1; //On va sur la première page 
		}

		$tabNews=$newsGateway->findByPage($numPage,$nbNews_par_Page); //On récupère les news pour la n-ième page
		require('Vues/pagePrincipale.php'); //On affiche
	}
	catch(PDOException $e){
		$tabErreur[]="Problème dans l'exécution des requêtes";
		require('Vues/erreur.php');
	}



?>