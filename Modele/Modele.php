<?php

	//Classe faisant le lien entre controllet et la dal
	class Modele{


		//Objectif : Ajouter une news
		public function ajouterNews($titre,$contenu){
			$n=new News(0,date('Y-m-d H:i:s'),$titre,$contenu,[]);
			$nGT=new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$nGT->insertNews($n);
		}
		
		//Objectif : Récupère une news d'après son titre
		public function RechercherNews($recherche){
			$nGT = new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$tabnews = $nGT->getNewsByTitre($recherche);
			return $tabnews;
		}

		//Objectif : Supprime une news
		public function supprimerNews($id){;
			$nGT = new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$nGT->deleteNews($id);
		}

		//Objectif : Reécupère une news par rapport à son id
		public function rechercheId($id){
			$nGT = new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$n = $nGT->getNewsById($id);
			return $n[0];		
		}

		//Objectif : Ajouter un commentaire à une news
		public function ajoutCom ($com, $pseudo, $id){
			$cGT = new CommentaireGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$c = new Commentaire(date('Y-m-d H:i:s'), $com, $pseudo, 0);
			$cGT->insertCom($c,$id); //id -> id de la news
			$_SESSION['pseudo']=$pseudo; //On garde en mémoire le pseudo entré précédemment pour le prochain ajout de commentaire
			setcookie('nbCom',$_COOKIE['nbCom']+1); //On actualise
		}

		//Objectif : Récupérer le nombre total de news
		public function totalNews(){
			$nGT = new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			return $nGT->getNbNews();
		}

		//Objectif : Récupérer le nombre total de commentaires
		public function totalCommentaire(){
			$cGT = new CommentaireGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			return $cGT->getComNumber();
		}

		//Objectif : Récupérer les news de la n-ième page
		public function findByPage($numPage,$nbNews_par_Page){
			$nGT = new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			return  $nGT->findByPage($numPage,$nbNews_par_Page);		
		}

		//Objectif : Récupérer les commentaires d'une news
		public function getComById ($id){
			$cGT = new CommentaireGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			return $cGT->getCommentairesByNews($id);
		}

		public function suppCom ($id){
			$cGT = new CommentaireGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$cGT->suppCom($id);
		}
	}
?>
