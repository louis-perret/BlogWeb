<?php
class validation
{
	static function validationLogin($login)
	{
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
	}

	static function validationTitre($titre)
	{
		$expTitre = "/^([a-zA-Z]* ?)*$/";
		if(preg_match($expTitre, $titre))
		{
			echo("titre bon\n");
			return $titre;
		}
		else
		{
			echo("titre mauvais\n");
			return false;
		}
	}

	static function validationContenu($contenu)
	{
		if(isset($contenu) && $contenu == filter_var($contenu, FILTER_SANITIZE_STRING))
		{
			echo("contenu bon\n");
			return $contenu;
		}
		else
		{
			echo("contenu dangereux\n");
			return false;
		}
	}
}
?>