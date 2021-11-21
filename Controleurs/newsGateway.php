<?php
	//require_once('/home/IUT/juduteyrat/Documents/php/Config/Validation.php');
	require_once('Config/Validation.php');
	//require_once('News.php');

	class NewsGateway{

		private $con;

		public function __construct($con){
			$this->con=$con;
		}

		//Objectif : Créer une news
		public function creerNews(string $titre, string $contenu, string $date, string $cheminImage){
			Validation::verifierNews($titre,$contenu,$date,$cheminImage);
			return new News($date,$titre,$contenu,$cheminImage);
		}

		//Objectif : insérer une news dans la BD
		public function insertNews(News $n){
			$query = 'insert into News(titre,date,contenu,image) Values(:titre,STR_TO_DATE(:d,"%Y-%m-%d"),:contenu,:image)';
			$param = array(
                ':titre' => array($n->getTitre(),PDO::PARAM_STR),
                ':d' => array($n->getDate(),PDO::PARAM_STR),
                ':contenu' => array($n->getContenu(),PDO::PARAM_STR),
                ':image' => array($n->getImage(),PDO::PARAM_STR),
            );
            $this->con->executeQuery($query,$param);
		}

		//Objectif ; supprimer une news de la BD par rapport à son id
		public function deleteNews(News $n){
			$query = 'delete from News where id=:id';
			$param = array(
                ':id' => array($n->getId(),PDO::PARAM_INT),
 
            );

            $this->con->executeQuery($query,$param);
		}

		//Objectif : Récupérer toutes les news par rapport à un titre
		public function getNewsByTitre($titre){
			$query = "select * from News where titre=:t";
			$param=array(
				':t' => array($titre,PDO::PARAM_STR),
			);

			$this->con->executeQuery($query,$param);
			$res=$this->con->getResults();

			//var_dump($res);
			$tabNews=[];
			foreach ($res as $key => $value) {
				$tabNews[]=new News((int)($res[$key]['id']),$res[$key]['date'],$res[$key]['titre'],$res[$key]['contenu'],$res[$key]['image'],[]);
			}
			return $tabNews;
				
		}

		//Objectif : Récupérer toutes les news par rapport à une date
		public function getNewsByDate($date){
			$query = "select * from News where date=STR_TO_DATE(:d,'%Y-%m-%d')";
			$param=array(
				':d' => array($date,PDO::PARAM_STR),
			);

			$this->con->executeQuery($query,$param);
			$res=$this->con->getResults();

			$tabNews=[];
			foreach ($res as $key => $value) {
				$tabNews[]=new News((int)($res[$key]['id']),$res[$key]['date'],$res[$key]['titre'],$res[$key]['contenu'],$res[$key]['image'],[]);
			}
			return $tabNews;
				
			

		}
	}
?>
