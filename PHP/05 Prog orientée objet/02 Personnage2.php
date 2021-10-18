<?php

class Personnage {

	// ATTRIBUTS

	// public -> partout
	// private -> que dans la classe (cas général)

	private $_force = 40;  // _ attribut privé
	private $_classe = "Plombier";
	private $_CouleurCasquette = "Rouge";
	private $_vie = 100;
	private $_nom = "Unknown";

	// CONSTRUCTEUR
	public function __construct($nom, $force, $couleur) { 

		$this->_nom = $nom;
		$this->setForce($force);
		$this->setCouleurCasquette($couleur);  
	}

	// METHODE

	// pas de getter / setter pour $nom car fixe dans notre cas

	public function getName() {
		return $this->_nom;
	}

	public function getForce() {

		return $this->_force;
	}

	public function setForce($force) {

		$this->_force = $force;  // sans $
	}

	public function getCouleurCasquette() {

		return $this->_CouleurCasquette;
	}

	public function setCouleurCasquette($couleur) {

		$this->_CouleurCasquette = $couleur;  // sans $
	}

	public function getClasse() {

		return $this->_classe;
	}

	public function getInfos() {

		return '<p>Je suis '.$this->_nom.' un '.$this->_classe.' ,ma force est de '.$this->_force.', ma vie est de '.$this->_vie.' points et ma casquette est '.$this->_CouleurCasquette.'.</p>';
	}

	public function frapper(Personnage $personnage) {  // la fct prend en param un obj de la classe (obligatoire ou $personnage suffit ?)															Personnage
		return $personnage->recevoirDegats($this->_force);
	}

	public function recevoirDegats($force) {

		$this->_vie = $this->_vie - $force;

		if($this->_vie <= 0) {

			$this->_vie = 0;
			echo '<p>'.$this->_nom.' est mort. RIP !</p>';

		} else {

		echo '<p>'.$this->_nom.' a pris '.$force. ' de dégats et a '.$this->_vie.' points de vie.</p>';

		}
	}


}

$mario = new Personnage("Mario", 45 , "rouge"); 
$luigi = new Personnage("Luigi", 40 , "verte"); 

echo $mario->getInfos();  // appliquer une fonction à une instance
echo $luigi->getInfos();

$mario->frapper($luigi);

echo $luigi->getInfos();

$mario->frapper($luigi);

echo $luigi->getInfos();

$mario->frapper($luigi);

echo $luigi->getInfos();
