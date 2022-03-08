<?php 
include_once('bdd_connect.php'); 
if(isset($_POST['connexion'])){
    try{
    $email = $_POST['email'];
    $psw = sha1($_POST['psw']);
    $bdd = getNewPDO();
    $sql = $bdd->prepare("CALL proc_connexion_utilisateur(:p0,:p1);");
    $sql->bindParam(":p0",$email,PDO::PARAM_STR,250);
    $sql->bindParam(":p1",$psw,PDO::PARAM_STR,250);
    $sql->execute();
    if($sql->rowCount() == 1){
        $row_get_connexion = $sql->fetch(PDO::FETCH_OBJ);
        $_SESSION['idUtilisateur'] = $row_get_connexion->id;
        $_SESSION['nom'] = $row_get_connexion->nomUtilisateur;
        $_SESSION['prenom'] = $row_get_connexion->prenomUtilisateur;
        $_SESSION['email'] = $row_get_connexion->emailUtilisateur;
        $_SESSION['psw'] = $row_get_connexion->pswUtilisateur;
        header('Location:index.php');
    }else{
        $erreur = "Identifiant et/ou mot de passe incorrect !";
    }
    }catch(PDOException $e) {
        $erreur = $e;
      }
}
?>
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
    <h3 class="text-center">Page de connexion IUT du havre</h3>
    <form method="POST">
        <div class="container">
            <div class="row m-5">
                <div class="col"></div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Se connecter</h5>
                            <div class="container">
                                <div class="row">
                                    <div class="col mb-2"><input type="text" class="box-input" name="email" placeholder="Email" required /></div>
                                    <div class="col"><input type="password" class="box-input" placeholder="Mot de passe" name="psw" required/></div>
                                </div>
                                <div class="col m-5"><button type="submit" name="connexion" id="connexion" class="box-button"> S'inscrire</button></div>
                                <p class="box-register">Pas encore inscrit? <a href="register.php">Inscrivez-vous ici</a></p>
                                <?php
                                    if (isset($erreur)) { ?>
                                        <div class="container alert alert-danger mt-3" role="alert">
                                            <p class="m-0"><i class="fas fa-exclamation-triangle"></i> ERREUR : <?php echo $erreur ?></p>
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