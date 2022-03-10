<?php 

include_once('connexion.php');
include_once('header.php');
session_start();
?>
<main>
	<div class="container">
		<h1>Créer un stage</h1>
		<form action="ajouterStage.php" method="POST">
			<div class="form-group">
				<label>Libellé du stage</label>
				<input type="text" class="form-control" id="stage_libelle" name="stage_libelle" placeholder="Ajouter un titre au stage">
			</div>
			<div class="form-group">
				<label>Nom de l'entreprise</label>
				<input type="text" class="form-control" id="stage_entreprise" name="stage_entreprise" placeholder="Le nom de l'entreprise">
			</div>

			<div class="form-group">
				<label>Description du stage</label>
				<textarea type="text" name="stage_description" class="form-control" placeholder="Description du stage : mission, position, compétences requises, ..." rows="10" cols="50"></textarea>
			</div>
			<div class="form-group">
				<input type="date" id="start" name="stage_date_debut" value="NULL">
			</div>
			<div class="form-group">
				<input type="date" id="start" name="stage_date_fin" value="NULL">
			</div>
			<button type="submit" class="btn btn-primary">Ajouter le stage</button>	
		</form>
	</div>
</main>
<?php include('footer.php');?>
