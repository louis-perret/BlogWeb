<?php
class Validation
{

	//Objectif : Vérifie si un entier est ni nulle et "bien nettoyé"
	public static function verifierEntier($i){
		if(isset($i)){
			return filter_var($i,FILTER_VALIDATE_INT);
		}
		return false;
	}

	//Objectif : Vérifie si une chaîne est ni nulle, ni vide et "bien nettoyée"
	public static function verifierChaine(&$chaine){
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

	//Objectif : Vérifie si le titre,contenu ne sont ni nulle, ni vides et "bien nettoyés".
	public static function verifierNews (string &$titre, string &$contenu, &$vueErreur)
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
		
	}

	//Objectif : Vérifie si le pseudo et le contenu du commentaire ne sont ni nulle, ni vides et "bien nettoyés"
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

	//Objectif : Vérifie si le login et le mot de passe rentrés ne sont ni vides, ni remplis d'espace
	//Sera amménée à changer quand on verra la connexion en cours
	public static function verifierConnexion(string $login, string $password, &$vueErreur){
		if(!self::verifierChaine($login)){
			$vueErreur[]='Saisie invalide';
		}

		else{
			if(!self::verifierChaine($password)){
				$vueErreur[]='Saisie invalide';
			}
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