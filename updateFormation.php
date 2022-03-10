<?php
    session_start();
    require 'bdd/MySQL.inc.php';
    $db = MySQL::getInstance();
    if ($db == null) { echo "Impossible de se connecter à la base de données !";}
    else { try 
    {
        $co_id=$_POST['id'];
        $co_titre=$_POST['titre'];
        $co_duree=$_POST['duree'];
        $co_acces=$_POST['acces'];
        $co_presentation=$_POST['presentation'];
        $co_debouches=$_POST['debouches'];
        $co_type_formation=$_POST['type_formation'];
        $co_nom_etablissement=$_POST['nom_etablissement'];
        $co_description=$_POST['description'];
        $co_url=$_POST['url'];

        $db->updateFormation($co_id,$co_titre, $co_duree,$co_acces,$co_presentation,$co_debouches,$co_type_formation,$co_nom_etablissement,$co_description,$co_url);
        header('Location: adminFormation.php');
    }
    catch (Exception $e){ echo $e->getMessage(); }
    $db->close();
}
?>