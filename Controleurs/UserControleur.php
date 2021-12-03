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
					case 'RechercherNews':
						echo "bon 1";
						break;
					default:
						if(isset($_REQUEST['search_bar']))
							$this->RechercherNews();
						else
							require("Vues/pagePrincipale.php");
						break;
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
	}
?>
