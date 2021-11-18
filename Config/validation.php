<?php
class Validation
{
	public static function verifierNews (string &$titre, string &$contenu, string &$cheminImage, &$vueErreur)
	{
		if(isset($titre) && $titre == "")
		{
			$vueErreur[] = 'Titre de la news vide.';
			$titre = "";
		}
		if(isset($contenu) && $contenu == "")
		{
			$vueErreur[] = 'Contenu de la news vide.';
			$contenu = "";
		}
		if($titre != filter_var($titre,FILTER_SANATIZE_STRING))
		{
			$vueErreur[] = 'Titre dangereux.';
			$titre = "";
		}
		if($contenu != filter_var($contenu,FILTER_SANATIZE_STRING))
		{
			$vueErreur[] = 'Contenu dangereux.';
			$contenu = "";
		}
		if($cheminImage != filter_var($cheminImage,FILTER_SANATIZE_STRING))
		{
			$vueErreur[] = 'Chemin image dangereux.';
			$cheminImage = "";
		}
	}
}
?>