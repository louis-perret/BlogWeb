<?php
	/* Classe permettant de représenter le compte de l'administrateur du blog*/
	class Compte
	{
		private $username;
		private $password;

		function __construct(string $username, string $password){
				$this->username=$username;
				$this->password=$password;
			}

		function getUsername()
		{
			return $this->username;
		}

		function getPassword()
		{
			return $this->password;
		}

		function setUsername( string $username)
		{
				$this->username = $username;
		}

		function setPassword (string $password)
		{
				$this->password = $password;
		}
	}
?>
