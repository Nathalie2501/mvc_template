<?php

require('modele/Categories.class.php');

class DaoCategories {

// si la variable $donnees retourne un résultat(que la table d'une catégorie à été cliqué par l'utilisateur sélectionné contient bien quelque chose), retourner sinon retourner null
	public function read($id) {
 		$donnees = DB::select('SELECT * FROM categories WHERE id = ?',array($id));
 		if (!empty($donnees)) {
 			$categories = new Categories($donnees['nom'],$donnees['img'],$donnees['description']);
 			$categories->setId($donnees['id']);

 			return $categories;
 		} else {
 			return null;
 		}	
 	}


public function AjoutTutoCat () {

}


public function readAll() {

//si la var donnees (selectionne moi toutes les catégories) contient des données envoie les au controlleur 
//information envoyée à la vue pour qu'elle soit affichée ->dans la vue on affichera tout ce qu'il y a dans les catégories. le controlleur recupère les données du readAll et demande à la page Tutos, index de gérer les infos pour les afficher
// Lié à tutos ctrl index 
 		$donnees = DB::select('SELECT * FROM categories');
 		$tabCategorie = array();
 	
 		if (!empty($donnees)) {
 			foreach ($donnees as $key => $donnee) {
	 			$tabCategorie[$key] = new Categories($donnee['nom'],$donnee['img'],$donnee['description']);
	 			$tabCategorie[$key]->setId($donnee['id']);
 			}

 			return $tabCategorie;
 		} else {
 			return null;
 		}	
 	}
 }
?>