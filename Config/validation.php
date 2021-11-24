<?php
class Validation
{

	//Objectif : Vérifie si une chaîne est ni nulle, ni vide et "bien nettoyée"
	public static function verifierChaine(string &$chaine){
		if(!isset($chaine) || empty($chaine))
		{
			return false;
		}
		if($chaine != filter_var($chaine,FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES))
		{							
			return false;
		}

		return true;
	}

	//Objectif : Vérifie si le titre,contenu ne sont ni nuls, ni vide et "bien nettoyé". Vérifie si l'image est bien nettoyé.
	public static function verifierNews (string &$titre, string &$contenu, $cheminImage, &$vueErreur)
	{
		if(!self::verifierChaine($titre))
		{
			$vueErreur[] = 'Titre de la news incorrect.';
			$titre = "";
		}

		if(!self::verifierChaine($contenu))
		{
			$vueErreur[] = 'Contenu de la news incorrect';
			$contenu = "";
		}

		if($cheminImage != filter_var($cheminImage,FILTER_SANITIZE_STRING))
		{
			$vueErreur[] = 'Chemin image correct';
			$cheminImage = "";
		}
		
	}

	//Objectif : Vérifie si le pseudo et le contenu du commentaire ne sont ni nuls, ni vide et "bien nettoyé"
	public static function verifierCommentaire(string $pseudo,string $contenu, &$vueErreur){
		if(!self::verifierChaine($pseudo))
		{
			$vueErreur[] = 'Pseudo du commentaire incorrect.';
			$titre = "";
		}

		if(!self::verifierChaine($contenu))
		{
			$vueErreur[] = 'Contenu du commentaire incorrect';
			$contenu = "";
		}

	}

	//Objectif : Vérifie si le login et le mot de passe rentrés ne sont ni vide, ni remplis d'espace
	//Sera amménée à changer quand on verra la connexion en cours
	public static function verifierConnexion(string $login, string $password, &$vueErreur){
		if(!self::verifierChaine($login) || self::verifierChaine($password)){
			$vueErreur[]='Saisie invalide';
		}
	}

	//Objectif : Vérifie si le numéro de page existe, est un nombre, est positif et inférieur au nombre maximum de pages
	public static function verifierPage($numPage,$nbMax){
		if(!isset($numPage) || $numPage!=filter_var($numPage,FILTER_VALIDATE_INT) || $numPage<=0 || $numPage>$nbMax){
			return false;
		}

		return true;
	}
}
?>