<?php
	require_once("Metier/Commentaire.php");
	require_once("Metier/News.php");
	require_once("DAL/CommentaireGateway.php");
	require_once("DAL/newsGateway.php");
	require_once("DAL/Connexion.php");
    $login="juduteyrat";
	$password="JeanMutilation_2";
	$dsn="mysql:host=berlin.iut.local;dbname=dbjuduteyrat";
	$c = new Connexion($dsn,$login,$password);
	$cgw = new CommentaireGateway($c);
	$ngw = new NewsGateway($c);
	$com = new Commentaire("21-11-27","contenu","moi");
	$n = new News(31,"21-11-27","titre","contenu",[]);
	$ngw->insertNews($n);
	$cgw->insertCom($com,$n);
	$cgw->insertCom($com,$n);
	$tab = $cgw->getCommentairesByNews($n);
	var_dump($tab);
	/*
	$cgw->deleteCom($n);
	echo "---------------------";
	$tab = $cgw->getCommentairesByNews($n);
	var_dump($tab);
	*/
	echo "------------------";
	$num = $cgw->getComNumber();
	var_dump($num);
?>
