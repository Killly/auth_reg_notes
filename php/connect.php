<?php
$login = "root";
$pass = "root";

$dsn = 'mysql:host=localhost;dbname=zapiski';
$pdo = new PDO($dsn, $login, $pass);

if(!$pdo) {
	die('Error in connection to db');
}
?>