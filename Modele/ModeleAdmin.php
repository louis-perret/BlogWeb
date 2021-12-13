<?php

	class ModeleAdmin{


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