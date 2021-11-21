<?php

	//Gateway qui sert uniquement à permettre la connexion de l'administrateur du site
	require_once('Modele/Compte.php');
	class CompteGateway
	{
			private $con;

			public function __construct(Connexion $con)
			{
				$this->con = $con;
			}

			//Objectif : Récupérer le compte admin
			public function getCompte(string $login, string $password)
			{
				$query="select * from admin where pseudo=:login and motDePasse=:password";
				$param=array(
					':login' => array($login,PDO::PARAM_STR),
					':password' => array($password,PDO::PARAM_STR),
				);

				$rep=$this->con->executeQuery($query,$param);
				if($rep){
					$tabRes=$this->con->getResults();
					foreach($tabRes as $res){
						return new Compte($res['pseudo'],$res['motDePasse']);
					}
				}
				
			}


	}
?>