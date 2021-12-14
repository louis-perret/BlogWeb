<?php

	class Modele{


		public function ajouterNews($titre,$contenu){
			$n=new News(0,date('Y-m-d'),$titre,$contenu,[]);
			$nGT=new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$nGT->insertNews($n);
		}
		
		public function RechercherNews($recherche){
			$nGT = new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$tabnews = $nGT->getNewsByTitre($recherche);
			return $tabnews;
		}

		public function supprimerNews($id){;
			$nGT = new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$nGT->deleteNews($id);
		}

		public function rechercheId($id){
			$nGT = new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$n = $nGT->getNewsById($id);
			return $n;		
		}

		public function ajoutCom ($com, $pseudo, $id){
			$cGT = new CommentaireGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$c = new Commentaire(date('Y-m-d H:i:s'), $com, $pseudo);
			$cGT->insertCom($c,$id);
			$_SESSION['pseudo']=$pseudo; //On garde en mémoire le pseudo entré précédemment pour le prochain ajout de commentaire
		}

		public function totalNews(){
			$nGT = new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			return $nGT->getNbNews();
		}

		public function totalCommentaire(){
			$cGT = new CommentaireGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			return $cGT->getComNumber();
		}

		public function findByPage($numPage,$nbNews_par_Page){
			$nGT = new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			return  $nGT->findByPage($numPage,$nbNews_par_Page);		
		}

		public function getComById ($id){
			$cGT = new CommentaireGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			return $cGT->getCommentairesByNews($id);
		}
	}
?>
