<?php
	class UserControleur{


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
					case NULL :
						if(isset($_REQUEST['search_bar']))//la search bar ne renvoie pas d'action
							$this->RechercherNews();
						elseif(isset($_REQUEST['com']))
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
				$tabErreur[]="Erreur dans l'éxécution de l'action utilisateur";
				require('Vues/erreur.php');
			}
		}

		public function pageParPage()
		{
			$nbNews_par_Page=10;
			$totalNews=0;
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
			$GLOBALS['nbComTotal']=$model->totalCommentaire();
			$tabNews=$model->findByPage($numPage,$nbNews_par_Page); //On récupère les news pour la n-ième page
			require('Vues/pagePrincipale.php');
		}
	
	
		public function RechercherNews(){
			$tabErreur = [];
			$recherche=$_REQUEST['search_bar']; //On récupère les informations de la barre de recherche
			if(Validation::verifierChaine($recherche)){ //Si y'a pas d'erreur
				
				$modele=new Modele();
				$tabNews = $modele->RechercherNews($recherche);
				$numPage = 0;
				$nbPagesMax = 0;
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
			Validation::verifierCommentaire($pseudo,$commentaire, $tabErreur);
			if(count($tabErreur)==0){
				$modele=new Modele();
				$modele->ajoutCom($commentaire, $pseudo, $idNews);
				$GLOBALS['nbComTotal']=$modele->totalCommentaire(); //On actualise
				$_COOKIE['nbCom']=$_COOKIE['nbCom']+1; //On actualise
				$this->affichCom();
			}
			else{
				$tabErreur[]="Problème dans la saisie du commentaire";
				require('Vues/erreur.php');
			}
		}
	}
?>
