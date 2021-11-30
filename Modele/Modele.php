<?php

	require_once('Metier/News.php');
	require_once('DAL/NewsGateway.php');
	//require_once('Config/config.php');
	//Classe modèle pour news et commentaire et admin
	class Modele{


		public function ajouterNews($titre,$contenu){
			$n=new News(0,date('Y-m-d'),$titre,$contenu,[]);
			$nGT=new NewsGateway($GLOBALS['c']);
			$nGT->insertNews($n);
		}
	}
?>