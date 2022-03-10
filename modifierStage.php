<?php 
include_once('header.php');
include_once('connexion.php');

?>

<main>
	<div class="container">
		<h1>Présentation du stage</h1>
		<form action="updateStage.php" method="POST">
			<input type="hidden" name="stage_id" value="<?php echo $_POST['stage_id'] ?>">
			<div class="form-group">
				<label>Libellé du stage</label>
				<input type="text" class="form-control" id="stage_libelle" name="stage_libelle" placeholder="Ajouter un titre au stage" value="<?php echo $_POST['stage_libelle'] ?>">
			</div>
			<div class="form-group">
				<label>Nom de l'entreprise</label>
				<input type="text" class="form-control" id="stage_entreprise" name="stage_entreprise" placeholder="Le nom de l'entreprise" value="<?php echo $_POST['stage_entreprise'] ?>">
			</div>

			<div class="form-group">
				<label>Description du stage</label>
				<textarea type="text" name="stage_description" class="form-control" placeholder="Description du stage : mission, position, compétences requises, ..." rows="10" cols="50"><?php echo $_POST['stage_description']; ?></textarea>
			</div>
			<div class="container-fluid">
				<button type="submit" style="margin-top: 20px;" class="btn btn-primary">Modifier le stage</button>
				<a class="btn btn-secondary" style="margin-top: 20px;" href="<?php echo "afficherStage.php?stage_id=". $_POST['stage_id'] ?>">Annuler</a>
			</div>
		</form>
	</div>
</main>