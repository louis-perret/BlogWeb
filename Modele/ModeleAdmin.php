<?php

	//Classe faisant le lien entre controller et la dal pour les actions de l'administrateur
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

		//Objectif : Supprimer la session
		public function deconnexion(){
			session_unset();
			session_destroy();
			$_SESSION=array();
		}

		//Objectif : Ajouter une news
		public function ajouterNews($titre,$contenu){
			$n=new News(0,date('Y-m-d H:i:s'),$titre,$contenu,[]);
			$nGT=new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$nGT->insertNews($n);
		}
		//Objectif : Supprimer une news
		public function supprimerNews($id){;
			$nGT = new NewsGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$nGT->deleteNews($id);
		}

		//Objectif : Supprimer un commentaire
		public function suppCom ($id){
			$cGT = new CommentaireGateway(new Connexion($GLOBALS['dsn'],$GLOBALS['login'],$GLOBALS['password']));
			$cGT->suppCom($id);
		}

	}

?>