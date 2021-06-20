<?php
//error_reporting(0);

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST) {
	require_once('helpers.php');
	

	if(
		!empty($_POST['hostname']) && 
		!empty($_POST['username']) && 
		!empty($_POST['database']) 
	){ 
		if( create_database($_POST) === false ) { $message = "No se pudo crear la base de datos."; } 
		else if (create_tables($_POST) === false) { $message = "No se pudo crear las tablas en la base de datos"; } 
		else if (write_db_config($_POST) === false) { $message = "No se pudo escribir en database.php, please chmod application/config/database.php file to 777"; } 
		else if (write_config($_POST) === false) { $message = "No se pudo escribir en config.php, please chmod application/config/config.php file to 777"; } 
		else if (create_admin($_POST) === false){ $message = "No se pudo agregar el usuario admin"; } 
		else { $message = "ok"; }
	}
	
	echo $message;
}
?>
