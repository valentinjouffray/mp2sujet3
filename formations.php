<?php
    session_start();
    
    require 'bdd/MySQL.inc.php';
    $db = MySQL::getInstance();
    if ($db == null) { echo "Impossible de se connecter à la base de données !";}
    else { try 
    {
        $listFormations = $db->getFormations();
        $perm = $_SESSION['perm'];
    if ($perm ==""){
        $perm = 0;
    }include 'header.php';
?>

    <div class="content">
        <h1>Liste des formations</h1>
        <div class="cards-mt" id="listFormation">
            <?php 
            foreach($listFormations as $formations) 
            {
                echo'
                <a class="card-mt" href="afficher.php?Formation='.$formations->getTitre_url().' ">
                <h2>'.$formations->getTitre().'</h2>
                <p>Durée : '.$formations->getDuree().' ans</p>
                <p>'.$formations->getPresentation().'</p>
                </a>
                ';
            }
            ?>
        </div>
    </div>
    <?php if($perm ==1){
                        ?> <br><a href="adminFormation.php" class="btn btn-success ms-3 mt-3 mb-2">Gérer les formations</a><?php
                    }else{
                    }?>
</body>

<?php
  }
  catch (Exception $e){ echo $e->getMessage(); }
  $db->close();
}
include_once('footer.php');
?>