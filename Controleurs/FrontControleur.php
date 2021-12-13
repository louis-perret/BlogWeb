<?php
	class FrontControleur
	{
		public function __construct()
		{
			try
			{
				$listeAction_Admin = array('afficherFormNews', 'ajouterNews', 'supprimerNews', 'connexion', 'seconnecter', 'sedeconnecter');
				if(isset($_SESSION['role']))				
					$admin = $_SESSION['role'];//new ModeleAdmin().isAdmin();
				else
					$admin = false;
				if(isset($_REQUEST['action']))
					$action = $_REQUEST['action'];
				else
					$action = null;
				if(in_array($action,$listeAction_Admin))
				{
					if($admin == false && $action != 'seconnecter')
						require('Vues/pageConnexion.php');
					else
						new AdminControleur();
				}
				else
					new UserControleur();
			}
			catch(Exception $e)
			{
				$tabErreur[]='Erreur du front controller';
				require('Vues/erreur.php');
			}
		}
	}
?>
