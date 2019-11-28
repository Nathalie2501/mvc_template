<?php
require_once('modele/Etapes.class.php');

class DaoEtapes {
	// déclaration de la fonction addEtapes avec la propriété $NewEtapes=> Lorsque nous appelerons addEtape (avec $NewEtapes en paramètre), elle retournera $NewEtapes qui contiendra les données à insérer dans la bdd lorsque l'utilisateur créera une étape. $NewEtapes->setId(DB::lastId());=> Enregistrera l'Id de l'étape créée.
	public function addEtapes($NewEtapes) {
		
		 DB::select('INSERT INTO etapes (proposition_flaconnage,materiels,ingredients,mode_operatoire,img,fk_tutos)VALUES (?,?,?,?,?,?)', 
			array($NewEtapes->getProposition_flaconnage(),
			$NewEtapes->getMateriels(),
			$NewEtapes->getIngredients(),
			$NewEtapes->getMode_operatoire(),
			$NewEtapes->getImg(),
			$NewEtapes->getFk_tutos()

			
));
		


if(!empty($donnees)) {
 			$NewEtapes = new Etapes($donnees['proposition_flaconnage'],$donnees['materiels'],$donnees['ingredients'],$donnees['mode_operatoire'],$donnees['img'],$donnees['fk_tutos']);
 		}
 		$NewEtapes->setId(DB::lastId());
 		
 		return $NewEtapes;

}

		
//lire et récupérer les données de l'étape selon l'id du tuto
		public function readEtapes($id) {
 		
 		$donnees = DB::select('SELECT * FROM etapes WHERE fk_tutos = ?',array());

// Affectation à la variable $donnees de la nouvelle instance de l'objet Etapes avec en paramètre les données venant de la BDD.		
 		if (!empty($donnees)) {
 			$etapes = new Etapes($donnees['proposition_flaconnage'],$donnees['materiels'],$donnees['ingredients'],$donnees['mode_operatoire'],$donnees['img'],$donnees['fk_tutos']);
 			
 			
 			

 			return $etapes;
 		
 	}
	

	
}

	public function readAll() {
		
			$donnees = DB::select('SELECT * FROM etapes');
		$tabEtapes = array();
		
		if (!empty($donnees)) {
 			foreach ($donnees as $key => $donnee) {
	 			
	 			$tabEtapes[$key] = new Etapes($donnee['proposition_flaconnage'],$donnee['materiels'],$donnee['ingredients'],$donnee['mode_operatoire'],$donnee['img']);
	 			$tabEtapes[$key]->setId($donnee['id']);
 			}

 			return $tabEtapes;
 		} else {
 			return null;
 		}	
 	}


	/*public function readAllByTutos($id){
		$donnees = DB::select('SELECT * FROM etapes WHERE fk_tutos = ?',array($id));
//!empty vide ou pas //isset existe ou pas
	$tabEtapes = array();
 			if(!empty($donnees))
 			{
 				foreach ($donnees as $key => $donnee) {
 				$tabEtapes[$key] = new Etapes(
 					$donnee['proposition_flaconnage'],$donnee['materiels'],$donnee['ingredients'],$donnees['mode_operatoire'],$donnee['img'],$donnee['fk_users']);
 				$tabTutos[$key]->setId($donnee ['id']);
 				}
			return $tabTutos;
		} else {
			return null;
		}	
		
	}*/
}


?>