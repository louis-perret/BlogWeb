<?php
	$expTitre = "/^([a-zA-Z]* ?)*$/";
	if(preg_match($expTitre, $titre))
	{
		echo("titre bon\n");
		//return $titre;
	}
	else
	{
		echo("titre mauvais\n");
		//return false;
	}
 	filter_var($news, FILTER_SANATIZE_STRING);
	echo($news);
	return $news;
?>