<?php

	class NewsGateway{

		private $con;

		public function __construct($con){
			$this->con=$con;
		}

		//Objectif : insérer une news dans la BD
		public function insertNews(News $n){
			$query = 'insert into News(titre,date,contenu) Values(:titre,STR_TO_DATE(:d,"%Y-%m-%d"),:contenu)';
			$param = array(
                ':titre' => array($n->getTitre(),PDO::PARAM_STR),
                ':d' => array($n->getDate(),PDO::PARAM_STR),
                ':contenu' => array($n->getContenu(),PDO::PARAM_STR),
            );
            $this->con->executeQuery($query,$param);
		}

		//Objectif ; supprimer une news de la BD par rapport à son id
		public function deleteNews(int $id){
			$query = 'delete from News where id=:id';
			$param = array(
                ':id' => array($id,PDO::PARAM_INT),
 
            );

            $this->con->executeQuery($query,$param);
		}

		//Objectif : Récupérer toutes les news par rapport à un titre
		public function getNewsByTitre($titre){
			$query = "select * from News where titre=:t Order by date";
			$param=array(
				':t' => array($titre,PDO::PARAM_STR),
			);

			$this->con->executeQuery($query,$param);
			$res=$this->con->getResults();

			$tabNews=[];
			foreach ($res as $key => $value) {
				$tabNews[]=new News((int)($res[$key]['id']),$res[$key]['date'],$res[$key]['titre'],$res[$key]['contenu'],[]);
			}
			return $tabNews;
				
		}

		//Objectif : Récupérer toutes les news par rapport à une date
		public function getNewsByDate($date){
			$query = "select * from News where date=STR_TO_DATE(:d,'%Y-%m-%d') Order by(date) DESC";
			$param=array(
				':d' => array($date,PDO::PARAM_STR),
			);

			$this->con->executeQuery($query,$param);
			$res=$this->con->getResults();

			$tabNews=[];
			foreach ($res as $key => $value) {
				$tabNews[]=new News((int)($res[$key]['id']),$res[$key]['date'],$res[$key]['titre'],$res[$key]['contenu'],[]);
			}
			return $tabNews;	
		}

		//Objectif : Récupérer x news par rapport au numéro de page
		public function findByPage($numPage,$nbNews){
			$borneInf=($numPage-1)*$nbNews;
			$query="select * from News ORDER BY(date) DESC LIMIT :borneInf,:nbNews";
			$param=array(
				":borneInf" => array($borneInf,PDO::PARAM_INT),
				":nbNews" => array($nbNews,PDO::PARAM_INT),
			);


			$this->con->executeQuery($query,$param);
			$res=$this->con->getResults();
			$tabNews=[];
			foreach ($res as $key => $value) {
				$tabNews[]=new News((int)($res[$key]['id']),$res[$key]['date'],$res[$key]['titre'],$res[$key]['contenu'],[]);
			}
			return $tabNews;
		}

		//Objectif : Récupérer le nombre de news dans la base de données
		public function getNbNews(){
			$query="select count(*) from News;";
			$this->con->executeQuery($query,[]);

			$res=$this->con->getResults();
			return $res[0][0];
		}

		//Objectif : Récupérer l'id d'une news dans la base par rapport à son titre 
		//-> Utile car son id est automatiquement généré dans la base donc il faut le récupérer
		public function getIdNews($titre){
			$query = "select id from News where titre=:t";
			$param=array(
				':t' => array($titre,PDO::PARAM_STR),
			);

			$this->con->executeQuery($query,$param);
			$res=$this->con->getResults();
			if(count($res)!=0){
				return $res[0][0];
			}
			return -1; //La news n'existe pas		
		}

		public function getNewsById($id){
			$query = "select * from News where id=:id Order by date";
			$param=array(
				':id' => array($id,PDO::PARAM_STR),
			);

			$this->con->executeQuery($query,$param);
			$res=$this->con->getResults();

			$tabNews;
			foreach ($res as $key => $value) {
				$tabNews=new News((int)($res[$key]['id']),$res[$key]['date'],$res[$key]['titre'],$res[$key]['contenu'],[]);
			}
			return $tabNews;
				
		}
	}
?>
