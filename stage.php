<?php include_once('header.php');?>
<?php 
try {
	//Connection à la bdd via le pdo
	$mysqlClient = new PDO('mysql:host=localhost;dbname=projetmp2;charset=utf8', 'root', '');
}
catch(Exception $e) {
	//En cas d'erreur :
	die('Erreur : '.$e->getMessage());
}

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
	<a style="text-decoration: none; color: black;" href="#"> <!-- Cliquer dessus affiche la fiche du stage -->
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