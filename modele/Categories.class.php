<?php

class Categories extends AbstractEntity{
	private $nom;
	private $img;
	private $description;

	public function __construct($nom, $img, $description){
		$this->nom = $nom;
		$this->img = $img;
		$this->description = $description;
		
	}

	public function getNom() {
		return $this->nom;
	}

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
}


?>