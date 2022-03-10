<?php 
include_once('header.php');
include_once('connexion.php');

if(isset($_POST['stage_id'])){ //on vérifie si l'id du stage est renseigné
	$id = $_POST['stage_id'];
} else {
	echo "Erreur de id";
}

$sqlQuery = 'UPDATE stage SET stage_disponible = 0 WHERE stage_id = :stage_id'; // On récupère les données du stage avec cet id précis
$statement = $mysqlClient->prepare($sqlQuery);
$statement->execute([
	'stage_id' => $id
]);
$stages = $statement->fetch();

header('Location: ' . 'afficherStage.php?stage_id=' . $id);

?>

