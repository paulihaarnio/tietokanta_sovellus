<?php
$init = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/tietokantasovellus/myconf.ini");
$host = $init["host"];
$db = $init["db"];
$user = $init["username"];
$password = $init["pw"];

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
try {
	$pdo = new PDO($dsn, $user, $password);
    //echo "Connected!";
} catch (PDOException $e) {
	echo $e->getMessage();
}