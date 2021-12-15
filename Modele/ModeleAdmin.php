<?php

	//Classe gérant la connexion & déconnexion de l'administrateur
	class ModeleAdmin{


		//Objectif : Instancie le role admin à l'administrateur
		public function connexion($login,$password){
			$cgt = new CompteGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
		    $compte=$cgt->getCompte($login);
		    if($compte==null){ //Si y'a pas de résultat
		    	throw new Exception("Login incorrecte");
		    }

		    else{
		    	if(!password_verify($password, $compte->getPassword())){
		    		throw new Exception("Mot de passe incorrecte");
		    	}
		  		else{
		    		$_SESSION['role']=true; //On passe son boolean à true pour spécifier qu'il est connecté
		  		}
		   	}
		    return $compte; //On retourne son compte
		}


		//Objectif : Renvoie true si l'admin est connecté
		public function isAdmin(){
			if(isset($_SESSION['role']) && $_SESSION['role']){
				return true;
			}

			return false;
		}

		//Objectif : Supprime la session
		public function deconnexion(){
			session_unset();
			session_destroy();
			$_SESSION=array();
		}

	}

?>