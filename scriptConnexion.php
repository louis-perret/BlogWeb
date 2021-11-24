<?php

	//Script qui sera effectué par un contrôleur plus tard
	//A REVOIR quand on verra la connexion en cours
	require('Config/config.php');
	require_once('Config/Validation.php');
	require_once('DAL/CompteGateway.php');

	$loginAdmin=$_POST['login'];
	$passwordAdmin=$_POST['password'];
    $tabErreur=[];

    validation::verifierConnexion($loginAdmin,$passwordAdmin,$tabErreur);
            
    if(count($tabErreur)==0){ //Si y'a pas eu d'erreurs
    	include('Config/config.php');
    	$c = new CompteGateway($c);
    	$compte=$c->getCompte($loginAdmin,$passwordAdmin);
    	if(isset($compte)){ //Si y'a un résultat
    		require("Vues/pagePrincipale.php");
    	}
    	else{ 
    		$tabErreur[]='Pseudo ou mot de passe incorrect';
    		require('Vues/erreur.php');
    	}
    }
    else{
    	require('Vues/erreur.php');
    }
			
?>