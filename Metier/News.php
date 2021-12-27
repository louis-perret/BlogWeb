<?php
	/* Classe permettant de représenter une news du blog*/
	class News{
		private $id;
		private $date; //Sa date de publication
		private $titre; //Son titre
		private $contenu; //Son contenu
		private $tabCommentaires = [];

		
		//Constructeur
		public function __construct(int $id,string $date,string $titre,string $contenu, array $tabCommentaires){
			$this->id=$id;
			$this->date=$date;
			$this->titre=$titre;
			$this->contenu=$contenu;
			$this->tabCommentaires=$tabCommentaires;
		}

		/* Getter et setter de chaque propriété */
		/* Getter */

		public function getId(){
			return $this->id;
		}

		public function getDate(){
			return $this->date;
		}

		public function getTitre(){
			return $this->titre;
		}

		public function getContenu(){
			return $this->contenu;
		}

		public function getCommentaires(){
			return $this->tabCommentaires;
		}

		/*Setter */

		public function setId($id){
			$this->id=$id;
		}
		public function setDate($date){
			$this->date=$date;
		}

		public function setTitre($titre){
			$this->titre=$titre;
		}

		public function setContenu($contenu){
			$this->contenu=$contenu;
		}

		public function ajouterCommentaire(Commentaire $c){
			$this->tabCommentaires[]=$c;
		}

		/* Renvoie l'instance sous forme de chaîne de caractères */
		public function __toString(){
			return "Publié le : {$this->getDate()} {$this->getTitre()} {$this->getContenu()} ";
		}
	}
?>
