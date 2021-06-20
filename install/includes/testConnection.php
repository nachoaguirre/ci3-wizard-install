<?php
error_reporting(0);

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST) {    
	function test_conecction($data) {
		$mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],$data['database']);
		if(mysqli_connect_errno())
			return false;
		$mysqli->close();
		return true;
	}
	
	if(test_conecction($_POST) == false) {
		$message = "No se pudo conectar a la base de datos. make sure your the host, username, password, database name is correct.";
	} else {
		$message = "ok";
	}

	echo $message;
}
?>
