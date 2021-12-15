<?php
	/* Classe permettant de représenter le compte de l'administrateur du blog*/
	class Compte
	{
		private $username;
		private $password;

		public function __construct(string $username, string $password){
				$this->username=$username;
				$this->password=$password;
			}

		public function getUsername()
		{
			return $this->username;
		}

		public function getPassword()
		{
			return $this->password;
		}

		public function setUsername( string $username)
		{
				$this->username = $username;
		}

		public function setPassword (string $password)
		{
				$this->password = $password;
		}
	}
?>
