<?php
	/* Classe permettant de représenter un commentaire du blog*/
	class Commentaire
	{
		private $date;
		private $contenu;
		private $pseudo;

		public function __construct(string $date, string $contenu, string $pseudo){
			$this->date=$date;
			$this->contenu=$contenu;
			$this->pseudo = $pseudo;
		}

		//Getter

		public function getDate(){
			return $this->date;
		}

		public function getContenu(){
			return $this->contenu;
		}

		public function getPseudo(){
			return $this->pseudo;
		}

		//setter

		public function setDate(string $date){
			$this->date=$date;
		}

		public function setContenu(string $contenu){
			$this->contenu=$contenu;
		}

		public function setPseudo(string $pseudo){
			$this->pseudo=$pseudo;
		}
	}
?>
