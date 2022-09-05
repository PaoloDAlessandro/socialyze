<?php
	define('DB_SERVER', '127.0.0.1');
	define('DB_USERNAME', 'u819772339_root');
	define('DB_PASSWORD', 'P(1@m87D69C&G');
	define('DB_DATABASE', 'u819772339_socialyze');
	$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
?>
