<?php
	
	//Fabrique pour la classe métier News
	class DBFactory_News implements DBFactory{

		//Permet de créer les instances à partir de tabRes suivant la provenance des données (type)
		public static function creer($tabRes,$type){
			if(!isset($tabRes)){ //Si pas de données à créer
				throw new Exception('Aucun résultat à créer');
			}

			switch($type){
				case 'mysql':
					return self::creerNewsMySql($tabRes);
					break;
				default:
					throw new Exception('Type de base inconnu');
			}
		}

		//Créer les instances de News
		private static function creerNewsMySql($tabRes){
			$tabNews=[];
			foreach ($tabRes as $row) {
				$tabNews[]=new News((int)($row['id']),$row['date'],$row['titre'],$row['contenu'],[]);
			}
			return $tabNews;
		}
	}
?>
