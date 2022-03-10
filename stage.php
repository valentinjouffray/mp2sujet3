<?php

include_once('connexion.php');
session_start();
$sqlQuery = 'SELECT * FROM `stage` WHERE stage_disponible = 1'; // On récupère tous les stages disponibles
$statement = $mysqlClient->prepare($sqlQuery);
$statement->execute();
$stages = $statement->fetchAll();
include_once('header.php');
$perm = $_SESSION['perm'];
    if ($perm ==""){
        $perm = 0;
    }include_once('header.php');
?>
<main>
<h1 style="margin-left: 10%; margin-bottom: 0.7em;">La liste des stages disponibles</h1>
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
	<div class="container">
		<a style="text-decoration: none; color: black;" href="<?php echo "afficherStage.php?stage_id=". $stage['stage_id'] ?>"> <!-- Cliquer dessus affiche la fiche du stage -->
			<div class="row">
				<div class="col-sm solid-outline"><?php echo $stage['stage_libelle'] ?></div>
				<div class="col-sm solid-outline"><?php echo $stage['stage_entreprise'] ?></div>
				<div class="col-sm solid-outline"><?php echo $stage['stage_date_debut'] ?></div>
				<div class="col-sm solid-outline"><?php echo $stage['stage_date_fin'] ?></div>
			</div>
		</a>
	</div>
	<?php
}
?>
<div class="container">
<?php if($perm ==1){
                        ?> <br><a class="btn btn-primary" style="margin-top: 20px;" href="creationStage.php" class="button">Ajouter un stage</a><?php
                    }else{
                    }?>
	
</div>
</main>
<?php 
include_once('footer.php');
 ?>
<!--
<footer class="page-footer font-small blue pt-4">
  <div class="footer-copyright text-center py-3">LPRO DASI 2021/2022</div>
</footer>
-->