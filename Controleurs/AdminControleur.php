<?php
	//Controller pour les actions admin
	class AdminControleur extends UserControleur{


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
						$tabErreur[]='action admin invalide';
						require('Vues/erreur.php');
				}
			}
			catch(Exception $e){
				$tabErreur[]='Erreur 404';
				require('Vues/erreur.php');
			}
		}


		//Objectif : Afficher le formulaire pour ajouter une news
		public function afficherFormNews(){
			require('Vues/creerNews.php');
		}

		//Objectif : Ajouter une news au blog
		public function ajouterNews(){
			$tabErreur=[];
			$titre=$_REQUEST['title']; //On récupère les informations de la news
			$contenu=$_REQUEST['contenu'];
			Validation::verifierNews($titre,$contenu,$tabErreur); //On les vérifie
			if(count($tabErreur)==0){ //Si y'a pas d'erreur
				
				$modele=new Modele();
				$modele->ajouterNews($titre,$contenu);
				parent::pageParPage();
			}
			else{
				$tabErreur[]="Problème dans l'ajout d'une news";
				require('Vues/erreur.php');
			}
			
		}

		//Objectif : Supprimer une news du blog
		public function supprimerNews(){
			$id=$_REQUEST['id'];
			$modele=new Modele();
			$modele->supprimerNews($id);
			parent::pageParPage();
		}

		//Objectif : Afficher le formulaire de connexion
		public function afficherFormConnexion(){
			require('Vues/pageConnexion.php');
		}


		//Objectif : Créer le role admin à l'utilisateur
		public function connexion(){
			$loginAdmin=$_REQUEST['login'];
			$passwordAdmin=$_REQUEST['password'];
		    $tabErreur=[];

		    Validation::verifierConnexion($loginAdmin,$passwordAdmin,$tabErreur);
		            
		    if(count($tabErreur)==0){ //Si y'a pas eu d'erreurs
		    	$m = new ModeleAdmin();
		    	$compte=$m->connexion($loginAdmin,$passwordAdmin);
		    	if($compte!=null){ //Si y'a un résultat
		    		parent::pageParPage();
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

		//Objectif : Supprimer le role admin
		public function deconnexion(){
			$m = new ModeleAdmin();
			$m->deconnexion();
			$this->afficherNews();
		}
	}
?>
