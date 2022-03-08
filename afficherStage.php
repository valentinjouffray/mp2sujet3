<?php 
include_once('header.php');
include_once('connexion.php');

$sqlQuery = 'SELECT * FROM stage WHERE stage_id= :stage_id'; // On récupère les données du stage avec cet id précis
$statement = $mysqlClient->prepare($sqlQuery);
$statement->execute(['stage_id' => strval($_GET['stage_id'])]);
$stages = $statement->fetch();

//print_r($stages);

?>

<h1>Présentation du stage</h1>
<div class="container">
	<h2><?php echo $stages['stage_libelle']; ?></h2>
	<h5>Entreprise : <strong> <?php echo $stages['stage_entreprise'] ?></strong></h3>
	<p><?php echo $stages['stage_description']; ?></p>
	<h5>Date de début : <?php echo $stages['stage_date_debut']; ?></h5>
	<h5>Date de fin : <?php echo $stages['stage_date_fin']; ?></h5>
	<h5>Disponibilité du stage : 
		<?php
		if ($stages['stage_disponible']) {
			echo "Le stage est toujours disponible.";
		} else {
			echo "Le stage n'est plus disponible";
		}
		?>
			
		</h5>
		<a href="stage.php">Retourner à la liste des stages</a>
</div>