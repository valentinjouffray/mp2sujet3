<?php
session_start();
function getNewPDO(): PDO
{
    $host_name = 'localhost';
    $database = 'mp2_sujet3_1';
    $user_name = 'root';
    $password = '';
    $dbh = null;

    try {
        $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
    } catch (PDOException $e) {
        echo "Erreur!: " . $e->getMessage() . "<br/>";
        die();
    }
    return $dbh;
}