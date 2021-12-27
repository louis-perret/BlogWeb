<?php
//Met en place les variables globales
global $login;
global $password;
global $dsn;

	//Pour passer de l'un à l'autre, passer true à false
	if(true){ //Pour louis
		$GLOBALS['login']="root";
		$GLOBALS['password']="_Moomoo/259";
		$GLOBALS['dsn']="mysql:host=localhost;dbname=bdblog";
	}

	else{ //Pour Jules
		$GLOBALS['login']="juduteyrat";
		$GLOBALS['password']="JeanMutilation_2";
		$GLOBALS['dsn']="mysql:host=berlin.iut.local;dbname=dbjuduteyrat";
	}

	$tabErreur=[];
?>
