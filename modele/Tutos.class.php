<?php 
// Déclaration de l'objet Tutos (table tutos de la base de donnée natural_kosmeo_definitif) avec héritage (copier/coller) de la classe abstraite AbstractEntity (fonction getId pour récupérer l'id)
class Tutos extends AbstractEntity {
// Déclaration des attributs (propriétés du tutos)	
	private $nom;
	private $description;
	private $img;
	private $fk_categories;
	private $fk_users;

	
// Déclaration du constructeur avec ses arguments (paramètres) qui font références aux attributs (propriétés)
	public function __construct($nom,$description,$img,$fk_categories,$fk_users) {
// $this fait référence à l'instance de l'objet (new Objet() => dans Tutos.ctrl.php on déclare la requete (loadDao) qui va aller chercher les info dans la bdd/les supprimer/...
		$this->nom = $nom;
		$this->description = $description;
		$this->img = $img;
		$this->fk_categories = $fk_categories;
		$this->fk_users = $fk_users;
}

	public function getNom() {
		return $this->nom;
	}
// Setter (permet d'ecrire un attribut)//vérifie la valeur de l'attribut (ici FirstName)
	// Déclaration du setter pour le nom du tutos
	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function getImg() {
		return $this->img;
	}

	public function setImg($img) {
		$this->img = $img;
	}


	public function getFk_categories() {
		return $this->fk_categories;
	}
	public function setFk_categories($fk_categories) {
		$this->fk_categories = $fk_categories;
	}

	public function getFk_users() {
		return $this->fk_users;
	}
	public function setFk_users($fk_users) {
		$this->fk_users = $fk_users;
	}
}

 ?>