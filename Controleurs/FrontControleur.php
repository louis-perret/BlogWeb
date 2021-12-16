<?php
	//Choisie entre l'AdminController et le UserController suivant l'action émise par l'utilisateur
	class FrontControleur
	{
		public function __construct()
		{
			try
			{
				$listeAction_Admin = array('afficherFormNews', 'ajouterNews', 'supprimerNews', 'connexion', 'seconnecter', 'sedeconnecter', 'suppCom');
				if(isset($_SESSION['role'])) //Si le role admin existe 		
					$admin = $_SESSION['role']; 
				else
					$admin = false; //On le met à false sinon
				if(isset($_REQUEST['action']))
					$action = $_REQUEST['action']; //On récupère l'action
				else
					$action = null;
				if(in_array($action,$listeAction_Admin))
				{
					if(!$admin && $action != 'seconnecter') //S'il n'est pas connecté et qu'il ne tente pas de se connecter
						require('Vues/pageConnexion.php'); //On lui affiche le formulaire de connexion
					else
						new AdminControleur(); //On instancie l'AdminController s'il souhaite effectuer une action admin
				}
				else
					new UserControleur(); //On instancie le UserController s'il souhaite effectuer une action utilisateur
			}
			catch(Exception $e) //En cas d'erreur
			{
				$tabErreur[]='Erreur du front controller';
				require('Vues/erreur.php');
			}
		}
	}
?>
