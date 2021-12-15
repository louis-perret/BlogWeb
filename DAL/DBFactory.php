<?php

	//Interface fonctionnelle pour les points d'extensibilités
	interface DBFactory{

		//Permet de créer les instances à partir de tabRes suivant la provenance des données (type)
		public static function creer($tabRes,$type);
	}

?>


