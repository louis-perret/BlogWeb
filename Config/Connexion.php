<?php
	//Permet de se connecter et d'exécuter des requêtes sql
	class Connexion extends PDO{

		private $stmt;

		public function __construct($dsn,$pseudo,$mdp){
			parent::__construct($dsn,$pseudo,$mdp);
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		public function executeQuery($query,$param){
			$this->stmt=parent::prepare($query);
			foreach($param as $name => $value){
				$this->stmt->bindValue($name,$value[0],$value[1]);
			}
			return $this->stmt->execute();
		}

		public function getResults(){
			return $this->stmt->fetchall();
		}
	}
?>