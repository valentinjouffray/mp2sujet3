<?php
    session_start();
    include 'header.php';
    require 'bdd/MySQL.inc.php';
    $db = MySQL::getInstance();
    if ($db == null) { echo "Impossible de se connecter à la base de données !";}
    else { try 
    {
        $Formation = $db->getFormation($_GET['Formation'])[0];
?>

        <div class="content">
            <form method="post" action="updateFormation.php" id="test">
                <input type="hidden" name="id" value="<?php echo $Formation->getIdFormation(); ?>" />
                Titre : <input type="text" name="titre" value="<?php echo $Formation->getTitre(); ?>" /><br />
                Durée : <input type="number" name="duree" value="<?php echo $Formation->getDuree(); ?>" /><br />
                Accés : <input type="text" name="acces" value="<?php echo $Formation->getAcces(); ?>" /><br />
                Présetation : <textarea rows="5" cols="150" name="presentation" form="test"><?php echo $Formation->getPresentation(); ?></textarea><br />
                Débouchés : <textarea rows="5" cols="150" name="debouches" form="test"><?php echo $Formation->getDebouches(); ?></textarea><br />
                Type : <input type="text" name="type_formation" value="<?php echo $Formation->getTypeFormation(); ?>" /><br />
                Etablissement : <input type="text" name="nom_etablissement" value="<?php echo $Formation->getNomEtablissement(); ?>" /><br />
                Description : <textarea rows="5" cols="150" name="description" form="test"><?php echo $Formation->getDescriptif(); ?></textarea><br />
                URL : <input type="text" name="url" value="<?php echo $Formation->getTitre_url(); ?>" /><br />
                <input type="submit" value="Modifier la formation" />
            </form>
        </div>
    </div>
</body>

<?php
  }
  catch (Exception $e){ echo $e->getMessage(); }
  $db->close();
}
include_once('footer.php');
?>