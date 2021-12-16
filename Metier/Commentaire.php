<?php
	/* Classe permettant de représenter un commentaire du blog*/
	class Commentaire
	{
		private $date;
		private $contenu;
		private $pseudo;
		private $id;

		public function __construct(string $date, string $contenu, string $pseudo, int $id){
			$this->date=$date;
			$this->contenu=$contenu;
			$this->pseudo = $pseudo;
			$this->id = $id;
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

		public function getId(){
			return $this->id;
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

		public function setId(int $id){
			$this->id = $id;
		}
	}
?>
