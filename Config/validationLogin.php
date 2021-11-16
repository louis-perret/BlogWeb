<?php
	$experession = "/^[a-zA-Z0-9]+$/";
	if(preg_match($experession, $login))
	{
		echo("login bon\n");
		return $login;
	}
	else
	{
		echo("login mauvais\n");
		return false;
	}
?>