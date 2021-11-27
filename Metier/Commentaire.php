<?php
	class Commentaire
	{
		private $date;
		private $contenu;
		private $pseudo;
		//private array $listeCommentaire; //Tableau de commentaires

		public function __construct(string $date, string $contenu, string $pseudo){
			$this->date=$date;
			$this->contenu=$contenu;
			$this->listeCommentaire=[];
			if (isset($pseudo))
			{
				$this->pseudo = $pseudo;
			}
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

		public function setPseudo(string $pseudo){
			$this->pseudo=$pseudo;
		}

		/*public function ajouterCommentaire(Commentaire $c){
			$this->listeCommentaire[]=$c;
		}*/
	}
?>
