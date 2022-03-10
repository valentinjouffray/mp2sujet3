<?php
    session_start();
    
    require 'bdd/MySQL.inc.php';
    $db = MySQL::getInstance();
    if ($db == null) { echo "Impossible de se connecter à la base de données !";}
    else { try 
    {include 'header.php';
?>

        <div class="content">
            <form method="post" action="addFomation.php" id="ajouter">
                Titre : <input type="text" name="titre" value="" /><br />
                Durée : <input type="number" name="duree" value="" /><br />
                Accés : <input type="text" name="acces" value="" /><br />
                Présetation : <textarea rows="5" cols="150" name="presentation" form="ajouter"></textarea><br />
                Débouchés : <textarea rows="5" cols="150" name="debouches" form="ajouter"></textarea><br />
                Type : <input type="text" name="type_formation" value="" /><br />
                Etablissement : <input type="text" name="nom_etablissement" value="" /><br />
                Description : <textarea rows="5" cols="150" name="description" form="ajouter"></textarea><br />
                URL : <input type="text" name="url" value="" /><br />
                <input type="submit" value="Ajouter la formation" />
            </form>
        </div>
    </div>
</body>

<?php
  }
  catch (Exception $e){ echo $e->getMessage(); }
  $db->close();
}include('footer.php');
?>