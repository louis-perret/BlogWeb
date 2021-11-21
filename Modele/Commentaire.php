<?php
	class Commentaire
	{
		private string $date;
		private string $contenu;
		private string $pseudo;
		//private array $listeCommentaire; //Tableau de commentaires

		public function __construct(string $date, string $contenu){
			$this->date=$date;
			$this->contenu=$contenu;
			$this->listeCommentaire=[];
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

		/*public function getCommentaires(){
			return $this->listeCommentaire;
		}*/

		//setter

		public function setDate(string $date){
			$this->date=$date;
		}

		public function setContenu(string $contenu){
			$this->contenu=$contenu;
		}

		public function setPseudo(string $contenu){
			$this->pseudo=$pseudo;
		}

		/*public function ajouterCommentaire(Commentaire $c){
			$this->listeCommentaire[]=$c;
		}*/
	}
?>