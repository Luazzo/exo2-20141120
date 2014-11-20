<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 19/11/14
 * Time: 22:19
 */

class VehiculeManager {

	/** @var  PDO */
	private $pdo;

	public function __construct(PDO $connexion){
		$this->setConnexion($connexion);
	}

	public function setConnexion(PDO $connexion){
		$this->pdo = $connexion;
	}

	public function getConnexion(){
		return $this->pdo;
	}

	public function retrieveAll(){
		$query = "SELECT * FROM vehicules";
		/** @var PDOStatement $stmt */
		$stmt = $this->pdo->query($query);
		$stmt->execute();
		$set = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$return = array();
		foreach($set as $row){
			$return[] = new Vehicule($row);
		}
		return $return;
	}

	public function retrieveById($id){
		$query = "SELECT * FROM vehicules WHERE id=:id";
		$stmt = $this->pdo->prepare($query);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return new Vehicule($res[0]);
	}

	public function create(Vehicule $vehicule){
		$query = "INSERT INTO vehicules (marque, modele, portes, vitesse) VALUES (:marque, :modele, :portes, :vitesse)";
		$stmt = $this->pdo->prepare($query);
		$stmt->bindParam(':marque', $vehicule->getMarque());
		$stmt->bindParam(':modele', $vehicule->getModele());
		$stmt->bindParam(':portes', $vehicule->getPortes());
		$stmt->bindParam(':vitesse', $vehicule->getVitesse());
		$stmt->execute();
	}

	public function update(Vehicule $vehicule){
		$query = "UPDATE vehicules SET marque = :marque, modele = :modele, portes = :portes, vitesse = :vitesse WHERE id= :id";
		$stmt = $this->pdo->prepare($query);
		$stmt->bindParam(':marque', $vehicule->getMarque());
		$stmt->bindParam(':modele', $vehicule->getModele());
		$stmt->bindParam(':portes', $vehicule->getPortes());
		$stmt->bindParam(':vitesse', $vehicule->getVitesse());
		$stmt->bindParam(':id', $vehicule->getId());
		$stmt->execute();
	}

	public function delete(Vehicule $vehicule){
		$query = "DELETE FROM vehicules WHERE id = :id";
		$stmt = $this->pdo->prepare($query);
		$stmt->bindParam(':id', $vehicule->getId());
		$stmt->execute();
	}
} 