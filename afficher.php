<?php
session_start();
include 'header.php';
require 'bdd/MySQL.inc.php';
$db = MySQL::getInstance();
if ($db == null) {
    echo "Impossible de se connecter &agrave; la base de donn&eacute;es !";
} else {
    try {
        $Formation = $db->getFormation($_GET['Formation'])[0];
?>

<div class="content">
    <h1 class="text-center"><?php echo $Formation->getTitre();?></h1>
    <hr>
    <div class="en-tete">
        <div class="collone" >
            <strong>Niveau d'admission</strong>
            <br>
            <p><?php echo $Formation->getAcces(); ?></p>
        </div>
        <div class="collone">
            <strong>Durée</strong>
            <br>
            <p><?php echo $Formation->getDuree(); ?> ans</p>
        </div>
        <div class="collone">
            <strong>Localisation</strong>
            <br>
            <p><?php echo $Formation->getNomEtablissement(); ?></p>
        </div>
    </div>
    <hr>
    <h2>Présentation</h2>
    <p><?php echo $Formation->getPresentation(); ?></p>

    <h3>Les débouchés</h3>

    <p><?php echo $Formation->getDebouches(); ?></p>

    <h3>Description détaillée</h3>

    <p><?php echo $Formation->getDebouches(); ?></p>


</div>
</div>
</body>

<?php
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $db->close();
}
include('footer.php')
?>


