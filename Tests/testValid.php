<?php
	/* -- Test de notre classe validation -- */

	require_once("../Config/Validation.php");

	if(true){
		//Test sur les news 
		//News valide (on accepte qu'il y est pas d'image)
		$titre="Bientôt Noël";
		$contenu="Noël arrive à grand pas";
		//$cheminImage='';

		$tabErreur=[];

		Validation::verifierNews($titre,$contenu,$tabErreur);
		if(count($tabErreur)==0){
			print("News valide et nettoyée\n");
		}
		else{
			require('../Vues/erreur.php');
		}

		//News incorrect (titre & contenu)
		$titre="";
		$contenu="";
		$cheminImage='';

		$tabErreur=[];

		Validation::verifierNews($titre,$contenu,$tabErreur);
		if(count($tabErreur)==0){
			print("News valide et nettoyée\n");
		}
		else{
			require('../Vues/erreur.php');
		}

		//News incorrect (titre & contenu & image)
		$titre="<h1>Bientôt Noël</1>";
		$contenu="<body>Noël arrive à grand pas</body>";
		$cheminImage='<img>link</img>';

		$tabErreur=[];

		Validation::verifierNews($titre,$contenu,$tabErreur);
		if(count($tabErreur)==0){
			print("News valide et nettoyée\n");
		}
		else{
			require('../Vues/erreur.php');
		}
	}


	if(true){
		//Test sur les commentaires
		//Commentaire valide
		$pseudo='loperret2';
		$contenu="C'est cool !";

		$tabErreur=[];
		Validation::verifierCommentaire($pseudo,$contenu,$tabErreur);
		if(count($tabErreur)==0){
			print("Commentaire valide et nettoyé\n");
		}
		else{
			require('../Vues/erreur.php');
		}

		//Commentaire non valide
		$pseudo='';
		$contenu='';

		$tabErreur=[];
		Validation::verifierCommentaire($pseudo,$contenu,$tabErreur);
		if(count($tabErreur)==0){
			print("Commentaire valide et nettoyé\n");
		}
		else{
			require('../Vues/erreur.php');
		}

		//Commentaire non valide
		$pseudo='<h1>loperret2</h1>';
		$contenu='<body>C\'est cool !';

		$tabErreur=[];
		Validation::verifierCommentaire($pseudo,$contenu,$tabErreur);
		if(count($tabErreur)==0){
			print("Commentaire valide et nettoyé\n");
		}
		else{
			require('../Vues/erreur.php');
		}
	}
?>