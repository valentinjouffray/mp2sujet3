<?php 
include_once('bdd_connect.php');
if(isset($_POST['enregistrer'])){
    try{
    $email = $_POST['email'];
    $psw = sha1($_POST['psw']);
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $bdd = getNewPDO();
    $sql = $bdd->prepare("CALL proc_add_user(:p0,:p1,:p2,:p3);");
    $sql->bindParam(":p0",$email,PDO::PARAM_STR,250);
    $sql->bindParam(":p1",$psw,PDO::PARAM_STR,250);
    $sql->bindParam(":p2",$prenom,PDO::PARAM_STR,40);
    $sql->bindParam(":p3",$nom,PDO::PARAM_STR,40);
    $sql->execute();
    $valid = "Enregistrement reussi, veuillez à présent vous connecter ";
    }catch(PDOException $e) {
        $erreur = $e;
      }
} ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
     <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <h3 class="text-center mt-5">Page d'enregistrement IUT du havre</h3>
    <form method="POST">
        <div class="container">
            <div class="row m-5">
                <div class="col"></div>
                <div class="col">
                    <div class="card bg-secondary">
                        <div class="card-body">
                        <h5 class="card-title mb-4 text-white">S'inscrire</h5>
                            <div class="container">
                                <div class="row">
                                    <div class="mb-2"><input type="text" class="box-input" name="email" placeholder="Email" required /></div>
                                    <div class="mb-2"><input type="text" class="box-input" name="prenom" placeholder="Prénom" required /></div>
                                    <div class="mb-2"><input type="text" class="box-input" name="nom" placeholder="Nom" required /></div>
                                    <div class="mb-2"><input type="password" class="box-input" placeholder="Mot de passe" name="psw" required/></div>
                                </div>
                                <div class="col mt-3 ms-2 mb-2"><button type="submit" name="enregistrer" id="enregistrer" class="box-button btn btn-primary"> S'inscrire</button></div>
                                <p class="box-register">Déjà inscrit? <a class="text-dark fw-bold"href="login.php">Connectez-vous ici</a></p>
                                <?php
                                    if (isset($valid)) { ?>
                                        <div class="container alert alert-success mt-3" role="alert">
                                            <p class="m-0"><i class="fas fa-exclamation-triangle"></i> Validation : <?php echo $valid ?><a href="login.php">Connectez-vous ici</a></p>
                                        </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
</form>