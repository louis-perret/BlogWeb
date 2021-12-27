<?php

	//Fabrique pour la classe métier Commentaire
	class DBFactory_Commentaire implements DBFactory{

		//Permet de créer les instances à partir de tabRes suivant la provenance des données (type)
		public static function creer($tabRes,$type){
			if(!isset($tabRes)){ //Si pas de données à créer
				throw new Exception('Aucun résultat à créer');
			}

			switch($type){
				case 'mysql':
					return self::creerComMySql($tabRes);
					break;
				default:
					throw new Exception('Type de base inconnu');
			}
		}


		//Créer les instances de Commentaire
		private static function creerComMySql($tabRes){
			$tabCom=[];
			foreach ($tabRes as $row) {
				$tabCom[]=new Commentaire($row['date'],$row['contenu'],$row['pseudo'],$row['id']);
			}
			return $tabCom;
		}
	}
?>