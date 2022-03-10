<?php 
include_once('connexion.php');

if(isset($_POST['stage_id'])){
	$id = $_POST['stage_id'];
} else {
	echo "Erreur de id";
}

$sqlQuery = 'UPDATE stage SET stage_libelle = :stage_libelle, stage_description = :stage_description, stage_entreprise = :stage_entreprise WHERE stage_id = :stage_id'; // On récupère les données du stage avec cet id précis
$statement = $mysqlClient->prepare($sqlQuery);
$statement->execute([
	'stage_id' => $id,
	'stage_libelle' => $_POST['stage_libelle'],
	'stage_description' => $_POST['stage_description'],
	'stage_entreprise' => $_POST['stage_entreprise']
]);
$stages = $statement->fetch();

header('Location: ' . 'afficherStage.php?stage_id=' . $id);

?>

