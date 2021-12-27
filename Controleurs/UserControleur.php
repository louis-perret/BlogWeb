<?php
	//Controller pour les actions utilisateurs
	class UserControleur{


		/* Constructeur */
		public function __construct(){
			try{
				if(isset($_REQUEST['action'])){
					$action=$_REQUEST['action'];
				}
				else{
					$action=NULL;
				}

				switch ($action) {
					case 'affichCom' :
						$this->affichCom();
						break;
					case NULL : //action par défaut
						if(isset($_REQUEST['search_bar']))//la search bar ne renvoie pas d'action
							$this->RechercherNews();
						elseif(isset($_REQUEST['com'])) //Si c'est pour ajouter un commentaire
							$this->ajoutCom();
						else
							$this->pageParPage();
						break;
					default :
						$tabErreur = ['action invalide'];
						require('Vues/erreur.php');
				}
			}
			catch(Exception $e){
				$tabErreur[]=$e->getMessage();
				require('Vues/erreur.php');
			}
		}

		//Objectif : Afficher la page principale du blog avec un système de liens
		public function pageParPage()
		{
			$nbNews_par_Page=10;
			$totalNews=0;
			$model = new Modele();
			$totalNews = $model->totalNews();
			$nbPagesMax=ceil($totalNews/$nbNews_par_Page); //On calcul le nombre de pages totales possibles
			$b=false; //Permet de savoir si le numéro de page est correcte (false par défaut)
			if(isset($_GET['page'])){
				$numPage=$_GET['page'];
				$b=Validation::verifierPage($numPage,$nbPagesMax);
			}
			if(!$b){ //Si le numéro est incorrecte
				$numPage=1; //On va sur la première page 
			}
			$tabNews=$model->findByPage($numPage,$nbNews_par_Page); //On récupère les news pour la n-ième page
			$modeleAdmin=new ModeleAdmin(); 
			$estConnecte=$modeleAdmin->isAdmin();//False si pas admin
			$nbComTotal=$model->totalCommentaire(); //Récupère le nombre total de commentaires du blog
			$compteur=$model->getCompteurCom(); //Récupère le nombre de commentaires postés par l'utilisateur
			require('Vues/pagePrincipale.php');
		}
	
	
		//Objectif : Afficher les news recherchées par rapport à un titre
		public function RechercherNews(){
			$recherche=$_REQUEST['search_bar']; //On récupère les informations de la barre de recherche
			if(Validation::verifierChaine($recherche)){ //Si y'a pas d'erreur
				$modele=new Modele();
				$tabNews = $modele->RechercherNews($recherche);
				$numPage = 0;
				$nbPagesMax = 0;
				$modeleAdmin=new ModeleAdmin(); 
				$estConnecte=$modeleAdmin->isAdmin();
				$nbComTotal=$modele->totalCommentaire();
				$compteur=$modele->getCompteurCom();
				require('Vues/pagePrincipale.php');
			}
			else{
				throw(new Exception('saisie de recherche invalide'));
			}
			
		}
		
		//Objectif : Afficher les commentaires d'une news
		public function affichCom(){
			if(isset($_REQUEST['id'])){
				$id = $_REQUEST['id'];
			}
			else{
				throw(new Exception('id incorrecte'));
			}
			if(!Validation::verifierEntier($id)){
				throw(new Exception('id incorrecte'));
			}
			$modele=new Modele();
			$n = $modele->rechercheId($id);
			if(!isset($n)){
				$this->pageParPage();
			}
			else{
				$tabCom = $modele->getComById($id);
				$GLOBALS['nbComTotal']=$modele->totalCommentaire();
				$modeleAdmin=new ModeleAdmin(); 
				$estConnecte=$modeleAdmin->isAdmin();
				$nbComTotal=$modele->totalCommentaire();
				$compteur=$modele->getCompteurCom();
				$pseudo=$modele->getPseudoBySession();
			 	require('Vues/commentaires.php');		
			}
		}

		//Objectif : Ajouter un commentaire dans le blog
		public function ajoutCom(){
			$tabErreur = [];
			$commentaire = $_REQUEST['com'];
			$pseudo = $_REQUEST['pseudo'];
			$idNews = $_REQUEST['id'];
			if(!Validation::verifierEntier($idNews)){
				throw(new Exception('id incorrecte'));
			}
			Validation::verifierCommentaire($pseudo,$commentaire, $tabErreur);
			if(count($tabErreur)==0){ //Si y'a pas d'erreur
				$modele=new Modele();
				$modele->ajoutCom($commentaire, $pseudo, $idNews);
				$this->affichCom();
			}
			else{
				throw(new Exception('saisie de commentaire invalide'));
			}
		}
	}
?>
