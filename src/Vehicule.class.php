<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 19/11/14
 * Time: 22:18
 */

class Vehicule {

	private $id;
	private $marque;
	private $modele;
	private $portes;
	private $vitesse;


	public function __construct($array=array()){
		// le constructeur appelle la méthode d'hydratation si ses paramètres sont un array
		if($array != null && is_array($array)){
			$this->hydrate($array);
		}
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId( $id ) {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getMarque() {
		return $this->marque;
	}

	/**
	 * @param mixed $marque
	 */
	public function setMarque( $marque ) {
		$this->marque = $marque;
	}

	/**
	 * @return mixed
	 */
	public function getModele() {
		return $this->modele;
	}

	/**
	 * @param mixed $modele
	 */
	public function setModele( $modele ) {
		$this->modele = $modele;
	}

	/**
	 * @return mixed
	 */
	public function getPortes() {
		return $this->portes;
	}

	/**
	 * @param mixed $portes
	 */
	public function setPortes( $portes ) {
		$this->portes = $portes;
	}

	/**
	 * @return mixed
	 */
	public function getVitesse() {
		return $this->vitesse;
	}

	/**
	 * @param mixed $vitesse
	 */
	public function setVitesse( $vitesse ) {
		$this->vitesse = $vitesse;
	}

	// la méthode d'hydratation de l'objet
	// ATTENTION : comme telle, cette méthode est trop légère: elle devrait comprendre les vérifications qui s'imposent
	// exemples champs obligatoires, valeurs contraintes etc
	public function hydrate($params){
		if(isset($params['id'])){
			$this->setId($params['id']);
		}
		if(isset($params['marque'])){
			$this->setMarque($params['marque']);
		}
		if(isset($params['modele'])){
			$this->setModele($params['modele']);
		}
		if(isset($params['portes'])){
			$this->setPortes($params['portes']);
		}
		if(isset($params['vitesse'])){
			$this->setVitesse($params['vitesse']);
		}
	}

} 