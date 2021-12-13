<?php

	class ModeleAdmin{


		public function connexion($login,$password){
			$c = new CompteGateway($GLOBALS['c']);
		    $compte=$c->getCompte($login);
		    if($compte==null){ //Si y'a un résultat
		    	throw new Exception("Login incorrecte");
		    }

		    else{
		    	if(!password_verify($password, $compte->getPassword())){
		    		throw new Exception("Mot de passe incorrecte");
		    	}
		  		else{
		    		$_SESSION['role']=true;
		  		}
		   	}
		    return $compte;
		}


		public function isAdmin(){
			if(isset($_SESSION['role']) && $_SESSION['role']){
				return true;
			}

			return false;
		}

		public function deconnexion(){
			session_unset();
			session_destroy();
			$_SESSION=array();
		}

	}

?>