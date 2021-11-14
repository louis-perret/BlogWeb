<?php
	/* Classe permettant de représenter une news du blog*/
	class News{
		private $date; //Sa date de publication
		private $titre; //Son titre
		private $contenu; //Son contenu

		/* 
		Objectif : Construire un objet Nexs
		Paramètres :
			-Entrée :
				date -> date de publication
				titre -> titre de la news
				contenu -> son contenu
			-Sortie : aucun
		*/
		function __construct($date,$titre,$contenu){
			$this->date=$date;
			$this->titre=$titre;
			$this->contenu=$contenu;
		}

		/* Getter et setter de chaque propriété */
		/* Getter */
		public function getDate(){
			return $this->date;
		}

		public function getTitre(){
			return $this->titre;
		}

		public function getContenu(){
			return $this->contenu;
		}

		/*Setter */
		public function setDate($date){
			$this->date=$date;
		}

		public function setTitre($titre){
			$this->titre=$titre;
		}

		public function setContenu($contenu){
			$this->contenu=$contenu;
		}

		/* Renvoie l'instance sous forme de chaîne de caractères */
		public function __toString(){
			/* Méthode pas trop dégueulasse d'afficher proprement en HTML -> à exploiter plus en pronfondeur avec le CSS */
			return "<p>Publié le : {$this->getDate()}</p> <h3> {$this->getTitre()} </h3> <p> {$this->getContenu()} </p>";
			#return 'A été publiée le : '.$this->date." {$this->titre} <BR>{$this->contenu}";
		}
	}
?>