<?php

	//Classe faisant le lien entre controller et la dal pour les actions utilisateurs
	class Modele{

		
		//Objectif : Récupère une news d'après son titre
		public function RechercherNews($recherche){
			$nGT = new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$tabnews = $nGT->getNewsByTitre($recherche);
			return $tabnews;
		}

		//Objectif : Reécupère une news par rapport à son id
		public function rechercheId($id){
			$nGT = new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$n = $nGT->getNewsById($id);
			return $n[0]??null;		
		}

		//Objectif : Ajouter un commentaire à une news
		public function ajoutCom ($com, $pseudo, $id){
			$cGT = new CommentaireGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$c = new Commentaire(date('Y-m-d H:i:s'), $com, $pseudo, 0);
			if($this->rechercheId($id)!=null){ //Si la news n'existe pas, on ajoute aucun commentaire
				$cGT->insertCom($c,$id); //id -> id de la news
				$_SESSION['pseudo']=$pseudo; //On garde en mémoire le pseudo entré précédemment pour le prochain ajout de commentaire
				$this->incrementerCompteurCom();
			}
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

		//Objectif : Récupérer le compteur du nombre de commentaire de l'utilisateur
		public function getCompteurCom(){
			if(isset($_COOKIE['nbCom'])){ //Si le cookie existe
				return $_COOKIE['nbCom'] ? Validation::verifierEntier($_COOKIE['nbCom']) : 0; //On retourne sa valeur si la validation est correcte sinon 0
			}
			return 0;
		}

		//Objectif : Incrémenter 
		public function incrementerCompteurCom(){
			if(isset($_COOKIE['nbCom'])){
				setcookie('nbCom',$this->getCompteurCom()+1); //On actualise
			}
			else{
				setcookie('nbCom',0,time()+365*24*3600);
			}
		}

		//Objectif : Retourner le pseudo sauvegardé
		public function getPseudoBySession(){
			if(isset($_SESSION['pseudo'])){ //Si elle existe
				if(Validation::verifierChaine($_SESSION['pseudo'])){ //On la vérifie
					return $_SESSION['pseudo'];
				}
				else{
					throw(new Exception('pseudo de session incorrecte'));
				}
			}
			return ""; //Dans le cas où elle n'existe pas
		}
	}
?>
