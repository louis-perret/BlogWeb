<?php
	
	require_once('Config/validation.php');
	require_once('Modele/Modele.php');
	class AdminControleur{


		public function __construct(){
			try{
				if(isset($_REQUEST['action'])){
					$action=$_REQUEST['action'];
				}
				else{
					$action=NULL;
				}

				switch ($action) {
					case 'afficherFormNews':
						$this->afficherFormNews();
						break;
					
					case 'ajouterNews':
						$this->ajouterNews();
						break;
					default:
						break;
				}
			}
			catch(Exception $e){
				$tabErreur[]='Erreur';
				require('Vues/erreur.php');
			}
		}

		public function afficherFormNews(){
			require('Vues/creerNews.php');
		}

		public function ajouterNews(){
			$tabErreur=[];
			$titre=$_REQUEST['title']; //On récupère les informations de la news
			$contenu=$_REQUEST['contenu'];
			Validation::verifierNews($titre,$contenu,$tabErreur); //On les vérifie
			if(count($tabErreur)==0){ //Si y'a pas d'erreur
				
				$modele=new Modele();
				$modele->ajouterNews($titre,$contenu);
				require('Vues/pagePrincipale.php');
			}
			else{
				$tabErreur[]="Problème dans l'ajout d'une news";
				require('Vues/erreur.php');
			}
			
		}
	}
?>
