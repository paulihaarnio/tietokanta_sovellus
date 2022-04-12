<?php
function getPdoConnection() {
	$ini = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/tietokanta_sovellus/myconf.ini", true);
	$host = $ini['host'];
	$database = $ini['database'];
	$user = $ini['username'];
	$password = $ini['password'];
	$dsn = "mysql:host=$host;dbname=$database;charset=utf8";
	try {
		$pdo = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	return $pdo;
}