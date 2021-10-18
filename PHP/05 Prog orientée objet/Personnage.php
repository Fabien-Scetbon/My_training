<?php

class Personnage {

	// ATTRIBUTS

	// public -> partout
	// private -> que dans la classe (cas général)

	private $_force = 40;  // _ attribut privé
	private $_classe = "Plombier";
	private $_CouleurCasquette = "Rouge";

	// CONSTRUCTEUR
	public function __construct($force) { // double _   il n'y a que force ! on peut ne rien mettre ()
											// on peut initialiser par defaut construct($force=35)
		$this->setForce($force);  // ici rien si pas de param dans ()
	}

	// METHODE

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

		return 'Je suis un '.$this->_classe.' ,ma force est de '.$this->_force.' et ma casquette est '.$this->_CouleurCasquette;
	}
}

$mario = new Personnage(70); // car il n'y a que force dans construct / si aucun param dans construct : 								new Personnage;

echo 'force constructeur '.$mario->getForce();

$mario->setForce(10);

echo '<br>force setter '.$mario->getForce().'<br>';

echo $mario->getInfos();

