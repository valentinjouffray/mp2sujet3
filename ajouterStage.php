<?php 
include_once('header.php');
include_once('connexion.php');


$stage_disponible = 1;

$sqlQuery = 'INSERT INTO stage (stage_id, stage_libelle, stage_description, stage_entreprise, stage_date_debut, stage_date_fin, stage_disponible) VALUES (NULL, :stage_libelle, :stage_description, :stage_entreprise, :stage_date_debut, :stage_date_fin, :stage_disponible);'; // On ajoute les données du stage
$statement = $mysqlClient->prepare($sqlQuery);
$statement->execute([
	'stage_libelle' => $_POST['stage_libelle'],
	'stage_description' => $_POST['stage_description'],
	'stage_entreprise' => $_POST['stage_entreprise'],
	'stage_date_debut' => $_POST['stage_date_debut'],
	'stage_date_fin' => $_POST['stage_date_fin'],
	'stage_disponible' => $stage_disponible
]);

header('Location: '.'stage.php');

//print_r($stage_disponible);

?>
