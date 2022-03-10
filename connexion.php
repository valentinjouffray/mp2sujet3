<?php 
try {
	//Connection à la bdd via le pdo
	$mysqlClient = new PDO('mysql:host=localhost;dbname=mp2_sujet3_1;charset=utf8', 'root', '');
}
catch(Exception $e) {
	//En cas d'erreur :
	die('Erreur : '.$e->getMessage());
}