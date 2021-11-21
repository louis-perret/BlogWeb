<?php
class Compte
{
	private string $username;
	private string $password;
	private string $estConnecte; 

	function __construct(string $username, string $password){
			$this->username=$username;
			$this->password=$password;
			$this->estConnecte=true; //Si un objet Compte est créé cela veut dire qu'il est connecté, donc true
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