<?php
	//Contrôleur pour les actions admin
	class AdminControleur extends UserControleur{


		/* Constructeur */
		public function __construct(){
			try{
				if(isset($_REQUEST['action'])){
					$action=$_REQUEST['action']; //Si l'action existe on la récupère
				}
				else{
					$action=NULL; //Sinon on l'a met à null
				}

				switch ($action) {
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
			$modele=new Modele();
			/* Utile pour le header */
			$nbComTotal=$modele->totalCommentaire();
			$compteur=$modele->getCompteurCom();
			$modeleAdmin=new ModeleAdmin(); 
			$estConnecte=$modeleAdmin->isAdmin();
			require('Vues/creerNews.php');
		}

		//Objectif : Ajouter une news au blog
		public function ajouterNews(){
			$tabErreur=[];
			$titre=$_REQUEST['title']; //On récupère les informations de la news
			$contenu=$_REQUEST['contenu'];
			Validation::verifierNews($titre,$contenu,$tabErreur); //On les vérifie
			if(count($tabErreur)==0){ //Si y'a pas d'erreur
				
				$modele=new ModeleAdmin();
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
			if(!Validation::verifierEntier($id)){
				throw(new Exception('id incorrecte'));
			}
			$modele=new ModeleAdmin();
			$modele->supprimerNews($id);
			parent::pageParPage();
		}

		//Objectif : Afficher le formulaire de connexion
		public function afficherFormConnexion(){
			$modele=new Modele();
			$nbComTotal=$modele->totalCommentaire();
			$compteur=$modele->getCompteurCom();
			$modeleAdmin=new ModeleAdmin(); 
			$estConnecte=$modeleAdmin->isAdmin();
			require('Vues/pageConnexion.php');
		}


		//Objectif : Créer le role admin à l'utilisateur
		public function connexion(){
			$loginAdmin=$_REQUEST['login'];
			$passwordAdmin=$_REQUEST['password'];
		    $tabErreur=[];

		    Validation::verifierConnexion($loginAdmin,$passwordAdmin,$tabErreur); //On vérifie le login et mdp
		            
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

		//Objectif : Supprimer un commentaire
		public function suppCom(){
			$id=$_REQUEST['idCom'];
			if(!Validation::verifierEntier($id)){
				throw(new Exception('id incorrecte'));
			}
			$modele=new ModeleAdmin();
			$modele->suppCom($id);
			parent::affichCom();
		}
	}
?>
