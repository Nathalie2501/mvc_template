<?php
// ----------- PHASE 1 : creation d'objet ----------- //
 // Déclaration de l'objet User (table User de la base de donnée natural_kosmeo_definitif) avec héritage (copier/coller) de la classe abstraite AbstractEntity (fonction getId pour récupérer l'id)
class User extends AbstractEntity {
	// Déclaration des attributs (propriétés de l'User)
	
	private $nom;
	private $prenom;
	private $email;
	private $pass;

	// Déclaration du constructeur avec ses arguments (paramètres) qui font références aux attributs (propriétés)
	
	public function __construct($nom,$prenom,$email, $pass) {
		
		// $this fait référence à l'instance de l'objet (new Objet() => dans User.ctrl.php on déclare la requete (loadDao) qui va aller chercher les info dans la bdd/les supprimer/...
		
		
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->email = $email;
		$this->pass = $pass;
	}
/*récupère et déclare la méthode pour envoyer l'id à jour*/
	public function getId() {
		return $this->id;
	}
    // Getter (permet de lire un attibut)
	// Déclaration du getter pour le nom
	public function getNom() {
		return $this->nom;
	}
    // Setter (permet d'ecrire un attribut)//vérifie la valeur de l'attribut (ici nom)
	// Déclaration du setter pour le nom
	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function getPrenom() {
		return $this->prenom;
	}

	public function setPrenom($prenom) {
		$this->prenom = $prenom;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getPass() {
		return $this->pass;
	}

	public function setPass($pass) {
		$this->pass = $pass;
	}


}

 ?>