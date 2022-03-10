<?php
    session_start();
    require 'bdd/MySQL.inc.php';
    $db = MySQL::getInstance();
    if ($db == null) { echo "Impossible de se connecter à la base de données !";}
    else { try 
    {
        $id = $_GET['Formation'];
        $db->deleteFormation($id);
        header('Location: adminFormation.php');
    }
    catch (Exception $e){ echo $e->getMessage(); }
    $db->close();
}
?>