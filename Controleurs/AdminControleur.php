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
					case 'suppCom' :
						$this->suppCom();
						break;
					default:
						$tabErreur[]='action admin invalide';
						require('Vues/erreur.php');
				}
			}
			catch(Exception $e){
				$tabErreur[]=$e->getMessage();
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
				throw(new Exception('saisie invalide pour le création de news'));
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
		    		throw(new Exception('action administrateur exécutée par utilisateur non connecté'));
		    	}
		    }
		    else{
		    	throw(new Exception('saisie de connection invalide'));
		    }
			
		}

		//Objectif : Supprimer le role admin
		public function deconnexion(){
			$m = new ModeleAdmin();
			$m->deconnexion();
			parent::pageParPage();
		}

		public function suppCom(){
			$id=$_REQUEST['idCom'];
			$modele=new Modele();
			$modele->suppCom($id);
			$GLOBALS['nbComTotal']=$modele->totalCommentaire();
			parent::affichCom();
		}
	}
?>
