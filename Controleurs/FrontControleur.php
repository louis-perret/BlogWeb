<?php
	class FrontControleur
	{
		public function __construct()
		{
			$listeAction_Admin = array('afficherFormNews', 'ajouterNews', 'supprimerNews', 'connexion', 'seconnecter', 'sedeconnecter');
			if(isset(
