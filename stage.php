<?php
include_once('header.php');
include_once('connexion.php');

$sqlQuery = 'SELECT * FROM stage'; // On récupère tous les stages disponibles
$statement = $mysqlClient->prepare($sqlQuery);
$statement->execute();
$stages = $statement->fetchAll();

?>
<h1>La liste des stages disponibles</h1>
<div class="container" style="background-color: grey;">
	<div class="row">
		<div class="col-sm" style="outline-style: solid;">
			<strong>Libellé</strong>
		</div>
		<div class="col-sm" style="outline-style: solid;">
			<strong>Nom de l'entreprise</strong>
		</div>
		<div class="col-sm" style="outline-style: solid;">
			<strong>Date de début</strong>
		</div>
		<div class="col-sm" style="outline-style: solid;">
			<strong>Date de fin</strong>
		</div>
	</div>
</div>
<?php
foreach ($stages as $stage){
	?>
	<a style="text-decoration: none; color: black;" href="<?php echo "afficherStage.php?stage_id=". $stage['stage_id'] ?>"> <!-- Cliquer dessus affiche la fiche du stage -->
		<div class="container">
			<div class="row">
				<div class="col-sm" style="outline-style: solid;"><?php echo $stage['stage_libelle'] ?></div>
				<div class="col-sm" style="outline-style: solid;"><?php echo $stage['stage_entreprise'] ?></div>
				<div class="col-sm" style="outline-style: solid;"><?php echo $stage['stage_date_debut'] ?></div>
				<div class="col-sm" style="outline-style: solid;"><?php echo $stage['stage_date_fin'] ?></div>
			</div>
		</div>
	</a>
	<?php
}
?>