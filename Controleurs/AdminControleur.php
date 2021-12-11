<?php
	class AdminControleur extends UserControleur{


		public function __construct(){
			try{
				if(isset($_REQUEST['action'])){
					$action=$_REQUEST['action'];
				}
				else{
					$action=NULL;
				}

				switch ($action) {

					case NULL:
						$this->afficherNews();
						break;
					case 'afficherFormNews':
						$this->afficherFormNews();
						break;
					
					case 'ajouterNews':
						$this->ajouterNews();
						break;

					case 'supprimerNews':
						$this->supprimerNews();
						break;

					case 'connexion':
						$this->afficherFormConnexion();
						break;
						
					case 'seconnecter':
						$this->connexion();
						break;

					case 'sedeconnecter':
						$this->deconnexion();
						break;
					default:
						$tabErreur[]='Erreur';
						require('Vues/erreur.php');
				}
			}
			catch(Exception $e){
				$tabErreur[]='Erreur';
				require('Vues/erreur.php');
			}
		}

		public function afficherNews(){
			parent::pageParPage();
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

		public function supprimerNews(){
			$id=$_REQUEST['id'];
			$modele=new Modele();
			$modele->supprimerNews($id);
			$this->afficherNews();
		}


		public function afficherFormConnexion(){
			require('Vues/pageConnexion.php');
		}


		public function connexion(){
			$loginAdmin=$_REQUEST['login'];
			$passwordAdmin=$_REQUEST['password'];
		    $tabErreur=[];

		    Validation::verifierConnexion($loginAdmin,$passwordAdmin,$tabErreur);
		            
		    if(count($tabErreur)==0){ //Si y'a pas eu d'erreurs
		    	$m = new Modele();
		    	$compte=$m->connexion($loginAdmin,$passwordAdmin);
		    	if(isset($compte)){ //Si y'a un résultat
		    		$_SESSION['role']=true;
		    		$this->afficherNews();
		    	}
		    	else{ 
		    		$tabErreur[]='Pseudo ou mot de passe incorrect';
		    		require('Vues/erreur.php');
		    	}
		    }
		    else{
		    	require('Vues/erreur.php');
		    }
			
		}

		public function deconnexion(){
			$_SESSION['role']=false;
			$this->afficherNews();
		}
	}
?>
