<?php 
include_once('header.php');
include_once('connexion.php');
session_start();
$sqlQuery = 'SELECT * FROM stage WHERE stage_id= :stage_id'; // On récupère les données du stage avec cet id précis
$statement = $mysqlClient->prepare($sqlQuery);
$statement->execute(['stage_id' => $_GET['stage_id']]);
$stages = $statement->fetch();

$perm = $_SESSION['perm'];
    if ($perm ==""){
        $perm = 0;
    }include_once('header.php');
?>



<main>
	<div class="container">
		<h1>Présentation du stage</h1>
		<h3><?php echo $stages['stage_libelle']; ?></h3>
		<h5>Entreprise : <strong> <?php echo $stages['stage_entreprise'] ?></strong></h5>
		<p class="description"><?php echo $stages['stage_description']; ?></p>
		<h5>Date de début : <?php echo $stages['stage_date_debut']; ?></h5>
		<h5>Date de fin : <?php echo $stages['stage_date_fin']; ?></h5>
		<h5>Disponibilité du stage : 
			<?php
			if ($stages['stage_disponible']) {
				echo "<strong>Le stage est toujours disponible.</strong>";
			} else {
				echo "<strong>Le stage n'est plus disponible.</strong>";
			}
			?>
				
		</h5>
		<a href="stage.php">Retourner à la liste des stages</a>
		<?php if($perm ==1){
                        ?> <form action="modifierStage.php" method="POST">
			<input type="hidden" name="stage_id" value="<?php echo $stages['stage_id']; ?>">
			<input type="hidden" name="stage_libelle" value="<?php echo $stages['stage_libelle']; ?>">
			<input type="hidden" name="stage_description" value="<?php echo $stages['stage_description']; ?>">
			<input type="hidden" name="stage_entreprise" value="<?php echo $stages['stage_entreprise']; ?>">
			<button type="submit" style="margin-bottom: 10px; margin-top: 10px;" class="btn btn-info">Modifier le stage</button>
		</form>

		<form action="modifierDisponibilite.php" method="POST">
			<input type="hidden" name="stage_id" value="<?php echo $_GET['stage_id']; ?>">
			<button type="submit" style="margin-bottom: 10px; margin-top: 10px;" class="btn btn-warning spaced-10px">Rendre le stage indisponible</button>
		</form>

		<form action="supprimerStage.php" method="POST">
			<input type="hidden" name="stage_id" value="<?php echo $_GET['stage_id']; ?>">
			<button type="submit" style="margin-bottom: 10px; margin-top: 10px;" class="btn btn-danger spaced-10px">Supprimer le stage</button>
		</form><?php
                    }else{
                    }?>
		
	</div>
</main>
<?php include('footer.php');?>
