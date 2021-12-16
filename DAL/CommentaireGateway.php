<?php

	//Fait le lien entre la classe Commentaire et la table Commentaire de la bd
	class CommentaireGateway {
	
		private $con;
		
		public function __construct($con) {
			$this->con = $con;
		}
		
		//Objectif : Insérer un commentaire dans la BD
		public function insertCom(Commentaire $c, $id){
			$query = 'insert into commentaire(date,contenu,pseudo,idNews) Values(STR_TO_DATE(:d,"%Y-%m-%d %H:%i:%s"),:contenu,:pseudo,:id)';
			$param = array(
                	':d' => array($c->getDate(),PDO::PARAM_STR),
               	 	':contenu' => array($c->getContenu(),PDO::PARAM_STR),
                	':pseudo' => array($c->getPseudo(),PDO::PARAM_STR),
					':id' => array($id,PDO::PARAM_INT),
            		);
            $this->con->executeQuery($query,$param);
		}

		//Objectif : Supprimer des commentaire de la BD par rapport à l'id d'une news
		public function deleteCom(News $n){
			$query = 'delete from commentaire where idNews=:id';
			$param = array(
                	':id' => array($n->getId(),PDO::PARAM_INT),
			);
		    $this->con->executeQuery($query,$param);
		}

		//Objectif : Récupérer tout les commentaires par rapport à une news
		public function getCommentairesByNews($id){
			$query = "select * from commentaire where idNews = :id Order by(date) DESC";
			$param=array(
				':id' => array($id,PDO::PARAM_INT),
			);

			$this->con->executeQuery($query,$param);
			$res=$this->con->getResults();
			return DBFactory_Commentaire::creer($res,'mysql');
				
		}

		//Objectif : Obtenir le nombre total de commentaires
		public function getComNumber() {
			$query = "select count(*) from commentaire";
			$this->con->executeQuery($query,[]);
			$res=$this->con->getResults();
			return $res[0][0];
		}

		public function suppCom($id){
			$query = "delete from commentaire where id = :id";
			$param=array(
				':id' => array($id,PDO::PARAM_INT),
			);
			$this->con->executeQuery($query,$param);
		}
}
