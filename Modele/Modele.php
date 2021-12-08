<?php

	class Modele{


		public function ajouterNews($titre,$contenu){
			$n=new News(0,date('Y-m-d'),$titre,$contenu,[]);
			$nGT=new NewsGateway($GLOBALS['c']);
			$nGT->insertNews($n);
		}
		
		public function RechercherNews($recherche){
			$nGT = new NewsGateway($GLOBALS['c']);
			$tabnews = $nGT->getNewsByTitre($recherche);
			return $tabnews;
		}

		public function supprimerNews($id){
			$nGT = new NewsGateway($GLOBALS['c']);
			$nGT->deleteNews($id);
		}

		public function rechercheId($id){
			$nGT = new NewsGateway($GLOBALS['c']);
			$n = $nGT->getNewsById($id);
			return $n;		
		}

		public function ajoutCom ($com, $id){
			$cGT = new CommentaireGateway($GLOBALS['c']);
			$c = new Commentaire();
			$cGT->insertCom($c,$id);
			return $cGT->getCommentairesByNews($id);
		}
		public function totalNews(){
			$nGT = new NewsGateway($GLOBALS['c']);
			return $nGT->getNbNews();
		}
		public function findByPage($numPage,$nbNews_par_Page){
			$nGT = new NewsGateway($GLOBALS['c']);
			return  $nGT->findByPage($numPage,$nbNews_par_Page);
		}
	}
?>
