<?php
	
	require_once('Config/validation.php');
	require_once('Modele/Modele.php');
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
					case 'ajoutCom':
						$this->ajoutCom();
						break;
					case NULL :
						if(isset($_REQUEST['search_bar']))//la search bar ne renvoie pas d'action
							$this->RechercherNews();
						else
							require("Vues/pagePrincipale.php");
						break;
					default :
						$tabErreur = ['action invalide'];
						require('Vues/erreur.php');
				}
			}
			catch(Exception $e){
				$tabErreur[]='Erreur';
				require('Vues/erreur.php');
			}
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
			require('Vues/commentaires.php');		
		}

		public function ajoutCom(){
			$tabErreur = [];
			$commentaire = $_REQUEST['com'];
			$pseudo = $_REQUEST['pseudo'];
			$idNews = $_REQUEST['id'];
			if(Validation::verifierChaine($commentaire)){
				$modele=new Modele();
				$modele->ajoutCom($commentaire, $idNews);
				require('Vues/commentaires.php');
			}
			else{
				$tabErreur[]="Problème dans le commentaire";
				require('Vues/erreur.php');
			}
		}
	}
?>
