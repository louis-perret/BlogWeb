<?php
	require_once('Metier/Commentaire.php');

	class CommentaireGateway {
	
		private $con;
		
		public function __construct($con) {
			$this->con = $con;
		}
		
		//Objectif : insérer un commentaire dans la BD
		public function insertCom(Commentaire $c){
			$query = 'insert into commentaire(date,contenu,pseudo) Values(STR_TO_DATE(:d,"%Y-%m-%d"),:contenu,:pseudo)';
			$param = array(
                	':d' => array($c->getDate(),PDO::PARAM_STR),
               	 	':contenu' => array($c->getContenu(),PDO::PARAM_STR),
                	':pseudo' => array($c->getPseudo(),PDO::PARAM_STR),
            		);
            		$this->con->executeQuery($query,$param);
		}

		//Objectif ; supprimer des commentaire de la BD par rapport à l'id d'une news
		public function deleteNews(News $n){
			$query = 'delete from commentaire where idNews =:id';
			$param = array(
                	':id' => array($n->getId(),PDO::PARAM_INT),
			);
		        $this->con->executeQuery($query,$param);
		}

		//Objectif : Récupérer tout les commentaires par rapport à une news
		public function getCommentairesByNews(News $n){
			$query = "select * from commentaire where idNews = :id Order by(date) DESC";
			$param=array(
				':id' => array($n->getId(),PDO::PARAM_INT),
			);

			$this->con->executeQuery($query,$param);
			$res=$this->con->getResults();

			$tabCom=[];
			foreach ($res as $key => $value) {
				$tabCom[]=new Commentaire($res[$key]['date'],$res[$key]['contenu'],$res[$key]['pseudo']);
			}
			return $tabCom;
				
		}

		//Objectif : obtenir le nombre total de commentaire
		public function getComNumber() {
			$query = "select count(*) from commentaire";
			$this->con->executeQuery($query,[]);
			$res=$this->con->getResults();
			return $res;
		}
}
