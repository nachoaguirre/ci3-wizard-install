<?php
error_reporting(0);

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST) {
	require_once('includes/helpers.php');

	if(!empty($data['hostname']) && !empty($data['username']) && !empty($data['database']) ){ 
		if(create_database($_POST) == false) {
			$message = "The database could not be created, make sure your the host, username, password, database name is correct.";
		} else if (create_tables($_POST) == false) {
			$message = "The database could not be created, make sure your the host, username, password, database name is correct.";
		} else if (write_db_config($_POST) == false) {
			$message = "The database configuration file could not be written, please chmod application/config/database.php file to 777";
		} else if (write_config($_POST) == false) {
			$message = "The config.php configuration file could not be written, please chmod application/config/config.php file to 777";
		}
	}

	
				
	
	echo $message;
}
?>
