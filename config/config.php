<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 19/11/14
 * Time: 22:18
 */


function loadClass($className, $dir=null){

	// if no directory setup a default one
	if(is_null($dir)){
		$dir = dirname(__FILE__)."/../";
	}
	foreach(scandir($dir) as $file){
		// recursive call if $file is a directory
		if(is_dir($dir.$file) && substr($file,0,1) !== '.'){
			loadClass($className, $dir.$file.'/');
		}
		// check if the filename ends in .php or in .class.php
		if(substr($file, 0, 2) !== '._' && preg_match("/.php/i", $file)){
			if(str_replace('.php', '', $file) == $className || str_replace('.class.php', '', $file) == $className){
				require_once $dir.$file;
			}
		}
	}
}

spl_autoload_register('loadClass');
// on évitera de mettre les données de connexion en dur dans les fichiers de configuration
// remplacer les *** par vos valeurs
define('DSN', 'mysql:host=localhost;dbname=*******');
define('DB_USER', '*********');
define('DB_PWD', '**********');
