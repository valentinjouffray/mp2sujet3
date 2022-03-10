<?php
    session_start();
    include 'header.php';
    require 'bdd/MySQL.inc.php';
    $db = MySQL::getInstance();
    if ($db == null) { echo "Impossible de se connecter à la base de données !";}
    else { try 
    {
        $listFormations = $db->getFormations();
?>
        <script src="https://kit.fontawesome.com/5f89b3f91b.js" crossorigin="anonymous"></script>
        <div class="content">
        <h1>Formations</h1>
        <br>
            <a class="w-25 fa-solid fa-plus btn btn-success" href=ajouterFormation.php>Ajouter</a>
            <hr>
        <table>
            <tr>
                <th>Titre</th>
                <th>Durée</th>
                <th>Accés</th>
                <th>Présetation</th>
                <th>Débouchés</th>
                <th>Type</th>
                <th>Etablissement</th>
                <th>Description</th>
                <th>URL</th>
                <th>Option</th>
            </tr>
            <?php 
            foreach($listFormations as $formations) 
            {
                echo'
                <tr>
                    <td>'.$formations->getTitre().'</td>
                    <td>'.$formations->getDuree().'</td>
                    <td>'.$formations->getAcces().'</td>
                    <td class="autoOverflow"><div class="autoOverflow">'.$formations->getPresentation().'</div></td>
                    <td class="autoOverflow"><div class="autoOverflow">'.$formations->getDebouches().'</div></td>
                    <td>'.$formations->getTypeFormation().'</td>
                    <td>'.$formations->getNomEtablissement().'</td>
                    <td class="autoOverflow"><div class="autoOverflow">'.$formations->getDescriptif().'</div></td>
                    <td>'.$formations->getTitre_url().'</td>
                    <td>
                    <a class="ms-2 me-2" href="modifierFormation.php?Formation='.$formations->getTitre_url().' "><i class="fa-regular fa-pen-to-square"></i></a>
                    <a href="deleteFormation.php?Formation='.$formations->getIdFormation().' "> <i class="fa fa-trash"></i> </a>
                    </td>
                </tr>';
            }
            ?>
            </table>
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