<?php 
include_once('header.php');
include_once('connexion.php');

if(isset($_POST['stage_id'])){
	$id = $_POST['stage_id'];
} else {
	echo "Erreur de id";
}

$sqlQuery = 'DELETE FROM stage WHERE stage_id = :stage_id'; // On supprime les données du stage avec cet id précis
$statement = $mysqlClient->prepare($sqlQuery);
$statement->execute([
	'stage_id' => $id 
	or die(print_r($mysqlClient->errorInfo()))
]);

print_r($id);

//header('Location: '.'stage.php');

//print_r($stages);

//print_r($_POST['stage_id'])

?>

