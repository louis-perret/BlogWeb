<?php
class Admin
{
	private $username;
	private $password;

	function __construct($username,$password){
			$this->username=$username;
			$this->password=$password;
		}

	function getUsername ()
	{
		return $this->username;
	}

	function getPassword ()
	{
		return $this->password;
	}

	function setUsername ($username)
	{
			$this->username = $username;
	}

	function setPassword ($password)
	{
			$this->password = $password;
	}
}
?>