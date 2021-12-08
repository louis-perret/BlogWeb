<?php
	class UserControleur{


		public function __construct(){
			//try{
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
					case NULL :
						if(isset($_REQUEST['search_bar']))//la search bar ne renvoie pas d'action
							$this->RechercherNews();
						if(isset($_REQUEST['com']))
							$this->ajoutCom();
						else
							$this->pageParPage();
						break;
					default :
						$tabErreur = ['action invalide'];
						require('Vues/erreur.php');
				}
			//}
			//catch(Exception $e){
			//	$tabErreur[]='Erreur';
			//	require('Vues/erreur.php');
			//}
		}

		public function pageParPage()
		{
			$nbNews_par_Page=10;
			$totalNews=0;
			/*
			$newsGateway=new NewsGateway($GLOBALS['c']);
			$totalNews=$newsGateway->getNbNews(); //On récupère le nombre de news total dans la base
			*/
			$model = new Modele();
			$totalNews = $model->totalNews();
			$nbPagesMax=ceil($totalNews/$nbNews_par_Page); //On calcul le nombre de pages totales possibles
			$b=false;
			if(isset($_GET['page'])){
				$numPage=$_GET['page'];
				$b=Validation::verifierPage($numPage,$nbPagesMax);
			}
			if(!$b){ //Si le numéro est incorrecte
				$numPage=1; //On va sur la première page 
			}
			$tabNews=$model->findByPage($numPage,$nbNews_par_Page); //On récupère les news pour la n-ième page
			require('Vues/pagePrincipale.php');
		}
	
		public function RechercherNews(){
			$tabErreur = [];
			$recherche=$_REQUEST['search_bar']; //On récupère les informations de la barre de recherche
			if(Validation::verifierChaine($recherche)){ //Si y'a pas d'erreur
				
				$modele=new Modele();
				$tabNews = $modele->RechercherNews($recherche);
				require('Vues/pagePrincipale.php');
			}
			else{
				$tabErreur[]="Problème dans la recherche de news";
				require('Vues/erreur.php');
			}
			
		}
		
		public function affichCom(){
			$tabErreur = [];
			$id = $_REQUEST['id'];
			$modele=new Modele();
			$n = $modele->rechercheId($id);
			$tabCom = $modele->getComById($id);
			require('Vues/commentaires.php');		
		}

		public function ajoutCom(){
			$tabErreur = [];
			$commentaire = $_REQUEST['com'];
			$pseudo = $_REQUEST['pseudo'];
			$idNews = $_REQUEST['id'];
			if(Validation::verifierChaine($commentaire)){
				$modele=new Modele();
				$modele->ajoutCom($commentaire, $pseudo, $idNews);
				$this->affichCom();
			}
			else{
				$tabErreur[]="Problème dans le commentaire";
				require('Vues/erreur.php');
			}
		}
	}
?>
