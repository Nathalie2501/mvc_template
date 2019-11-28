<?php

class Etapes extends AbstractEntity {

	private $proposition_flaconnage;
	private $materiels;
	private $ingredients;
	private $mode_operatoire;
	private $img;
	private $fk_tutos;
	
	


	public function __construct($proposition_flaconnage,$materiels,$ingredients,$mode_operatoire,$img,$fk_tutos) {

		$this->proposition_flaconnage = $proposition_flaconnage;
		$this->materiels = $materiels;
		$this->ingredients = $ingredients;
		$this->mode_operatoire = $mode_operatoire;
		$this->img = $img;
		$this->fk_tutos = $fk_tutos;
		

}
	
	public function getProposition_flaconnage() {
		return $this->proposition_flaconnage;
	}
// Setter (permet d'ecrire un attribut)//vérifie la valeur de l'attribut (ici FirstName)
	// Déclaration du setter pour le titre_etapes du tutos
	public function setProposition_flaconnage($proposition_flaconnage) {
		$this->proposition_flaconnage = $proposition_flaconnage;
	}

	

	public function getMateriels() {
		return $this->materiels;
	}
// Setter (permet d'ecrire un attribut)//vérifie la valeur de l'attribut (ici FirstName)
	// Déclaration du setter pour le materiels du tutos
	public function setMateriels($materiels) {
		$this->materiels = $materiels;
	}

	public function getIngredients() {
		return $this->ingredients;
	}
// Setter (permet d'ecrire un attribut)//vérifie la valeur de l'attribut (ici FirstName)
	// Déclaration du setter pour le ingredients du tutos
	public function setIngredients($ingredients) {
		$this->ingredients = $ingredients;
	}

	
	public function getMode_operatoire() {
		return $this->mode_operatoire;
	}
// Setter (permet d'ecrire un attribut)//vérifie la valeur de l'attribut (ici FirstName)
	// Déclaration du setter pour le mode_operatoire du tutos
	public function setMode_operatoire($mode_operatoire) {
		$this->mode_operatoire = $mode_operatoire;
	}



	public function getImg() {
		return $this->ingredients;
	}
// Setter (permet d'ecrire un attribut)//vérifie la valeur de l'attribut (ici FirstName)
	// Déclaration du setter pour le ingredients du tutos
	public function setImg($ingredients) {
		$this->ingredients = $ingredients;
	}

	public function getFk_tutos() {
		return $this->fk_tutos;
	}
// Setter (permet d'ecrire un attribut)//vérifie la valeur de l'attribut (ici FirstName)
	// Déclaration du setter pour le ingredients du tutos
	public function setFk_tutos($fk_tutos) {
		$this->fk_tutos = $fk_tutos;
	}


	
	

}

?>