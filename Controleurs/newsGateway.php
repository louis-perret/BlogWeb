<?php
	require_once('/home/IUT/juduteyrat/Documents/php/Config/Validation.php');
	require_once('News.php');

	class NewsGateway{

		private $con;

		public function __construct($con){
			$this->con=$con;
		}

		public function creerNews(string $titre, string $contenu, string $date, string $cheminImage){
			Validation::verifierNews($titre,$contenu,$date,$cheminImage);
			return new News($date,$titre,$contenu,$cheminImage);
		}

		public function insertNews(News $n){
			$query = 'insert into News(titre,date,contenu,image) Values(:titre,STR_TO_DATE(:d,"%d-%m-%Y"),:contenu,:image)';
			$param = array(
                ':titre' => array($n->getTitre(),PDO::PARAM_STR),
                ':d' => array($n->getDate(),PDO::PARAM_STR),
                ':contenu' => array($n->getContenu(),PDO::PARAM_STR),
                ':image' => array($n->getImage(),PDO::PARAM_STR),
            );

            $this->con->executeQuery($query,$param);
		}

		public function getNewsByTitre($titre){
			$query = "select * from News where titre=:t";
			if($titre == Filter_var($titre,FILTER_SANATIZE_STRING))
			{
				$param=array(
					':t' => array($titre,PDO::PARAM_STR),
				);

				$this->con->executeQuery($query,$param);
				$res=$this->con->getResults();

				var_dump($res);
				echo($res[0]['date']);
				return new News($res[0]['date'],$res[0]['titre'],$res[0]['contenu'],$res[0]['image']);
			}		
		}

		public function getNewsByDate($date){
			$query = "select * from News where date=:d";
			if($date == Filter_var($date,FILTER_SANATIZE_STRING))
			{
				$param=array(
					':d' => array($titre,PDO::PARAM_STR),
				);

				$this->con->executeQuery($query,$param);
				$res=$this->con->getResults();

				var_dump($res);
				echo($res[0]['date']);
				return new News($res[0]['date'],$res[0]['titre'],$res[0]['contenu'],$res[0]['image']);
			}
			

		}
	}
?>
