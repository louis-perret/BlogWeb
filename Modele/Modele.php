<?php

	require_once('Metier/News.php');
	require_once('DAL/newsGateway.php');
	//require_once('Config/config.php');
	//Classe modèle pour news et commentaire et admin
	class Modele{


		public function ajouterNews($titre,$contenu){
			$n=new News(0,date('Y-m-d'),$titre,$contenu,[]);
			$nGT=new NewsGateway($GLOBALS['c']);
			$nGT->insertNews($n);
		}
		
		public function RechercherNews($recherche){
			$nGT = new NewsGateway($GLOBALS['c']);
			$tabnews = $nGT->getNewsByTitre($recherche);
			return $tabnews;
		}

		public function supprimerNews($id){
			$nGT = new NewsGateway($GLOBALS['c']);
			$nGT->deleteNews($id);
		}
	}
?>
