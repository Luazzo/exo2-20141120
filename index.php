<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 19/11/14
 * Time: 22:19
 */

require_once dirname( __FILE__ ) . '/config/config.php';

$connexion = new PDO(DSN,DB_USER,DB_PWD);


$vehiculeManager = new VehiculeManager($connexion);

$v = new Vehicule();
$v->setVitesse(240);
$v->setMarque('Audi');
$v->setModele('A7');
$v->setPortes(4);
try{
	$vehiculeManager->create($v);
}catch(PDOException $e){
}
catch(Exception $e){
	echo $e->getMessage();

}

// $v1 = $vehiculeManager->retrieveById(3);
//$vehiculeManager->delete($v1);

