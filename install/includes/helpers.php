<?php
$base_url  = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://" . $_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
$base_url  = str_replace('install/', '', $base_url);
	
$cumple = array('php' => false, 'config' => false, 'db' => false, 'temp' => false,);

function checkPHPVersion($min=50600){
	if (!defined('PHP_VERSION_ID')) {
	    $version = explode('.', PHP_VERSION);		
	    define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
	    $version = "<5.2.7";
	} else { $version = phpversion(); }

	if(PHP_VERSION_ID < $min){ $ret = "<span class='text-danger'>".$version."</span>"; } 
	else {  
		global $cumple;
		$cumple['php'] = true;
		        $ret   = "<span class='text-success'>".$version."</span>";
	}	
	return $ret;	
}

function canWriteConfig(){
	if(is_writable('../application/config/config.php')) { global $cumple; $cumple['config'] = true; return true; } 
    else { return false; }
}

function canWriteDatabase(){
	if(is_writable('../application/config/database.php')) { global $cumple; $cumple['db'] = true; return true; } 
    else { return false; }
}

function tempPath(){
	return sys_get_temp_dir();
}

function canWriteTempPath(){
	if(is_writable( sys_get_temp_dir() )) { global $cumple; $cumple['temp'] = true; return true; } 
    else { return false; }
}



function checkReqs($cumple){
	if($cumple['php']==true && $cumple['config']==true && $cumple['db']==true && $cumple['temp']==true) { $cumple['result'] = true; } 
	else { $cumple['result'] = false; }
	return $cumple;
}


function write_db_config($data) {
	$template_path 	= 'templatedb.php';
	$output_path 	= '../../application/config/database.php';
	$database_file  = file_get_contents($template_path);

	$new  = str_replace("%HOSTNAME%",$data['hostname'],$database_file);
	$new  = str_replace("%USERNAME%",$data['username'],$new);
	$new  = str_replace("%PASSWORD%",$data['password'],$new);
	$new  = str_replace("%DATABASE%",$data['database'],$new);

	$handle = fopen($output_path,'w+');
	@chmod($output_path,0777);
	
	if(is_writable(dirname($output_path))) {
		if(fwrite($handle,$new)) { return true; }
		else { return false; }
	} 
	else { return false; }
}


function write_config($data) {       
	$template_path = 'templateconfig.php';
	$output_path   = '../../application/config/config.php';
	$config_file   = file_get_contents($template_path);

	$new  = str_replace("%BASE_URL%", $data['url'] ,$config_file);
	$new  = str_replace("%ENCRYPTION_KEY%", generateRandomString(), $new);
	$new  = str_replace("%APP_NAME%", cleanString($data["app_name"]), $new);
	$new  = str_replace("%TIME_REFERENCE%", $data["time_reference"], $new);
	
	$handle = fopen($output_path,'w+');
	@chmod($output_path,0777);
	
	if(is_writable(dirname($output_path))) {
		if(fwrite($handle,$new)) { return true; } 
		else { return false; }
	} 
	else { return false; }
}


function cleanString($string){
	$clean = str_replace(' ', '', $string);
	return strtolower($clean);
}


function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEjFGHIJKLMNOPQRSTUVWXYZ!$%&/()=?¿*-_';
	$str        = '';
	for ($i = 0; $i < $length; $i++) { $str .= $characters[rand(0, 74)]; }
	return $str;
}


function create_database($data) {
	$mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],'');
	if(mysqli_connect_errno())
		return false;
	$mysqli->query("CREATE DATABASE IF NOT EXISTS ".$data['database']);
	$mysqli->close();
	return true;
}

function create_tables($data) {
	$mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],$data['database']);
	if(mysqli_connect_errno())
		return false;
	$query = file_get_contents('../assets/database.sql');
	$mysqli->multi_query($query);
	$mysqli->close();
	return true;
}

function create_admin($data){
	$admin_email = $data["admin_email"];
	$admin_pass  = $data["admin_pass"];
	$admin_pass2 = password_hash($admin_pass, PASSWORD_BCRYPT);
	
	$mysqli = new mysqli($data["hostname"],$data["username"],$data["password"],$data["database"]);
	if(mysqli_connect_errno())
		return false;
	$mysqli->query("INSERT INTO ".$data['admin_table']." (email, password) VALUES ('".$admin_email."', '".$admin_pass2."')");
	$mysqli->close(); 
	return true;
}