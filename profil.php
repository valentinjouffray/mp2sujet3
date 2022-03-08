<?php
include_once('bdd_connect.php');    
include_once('header.php');
if (isset($_POST['CgMdp'])){
    $Amdp = sha1($_POST['AncienMdp']);
    if ($Amdp == $_SESSION['psw'] && $_POST['nvMdp'] == $_POST['RnvMdp'] && !empty($_POST['nvMdp'])){
        try{
            $nvMdp = sha1($_POST['nvMdp']);
            $idUtil = $_SESSION['idUtilisateur'];
            $bdd = getNewPDO();
            $sql = $bdd->prepare("CALL proc_update_psw(:p0,:p1);");
            $sql->bindParam(":p0",$idUtil,PDO::PARAM_INT);
            $sql->bindParam(":p1",$nvMdp,PDO::PARAM_STR,250);
            $sql->execute();
            $_SESSION['psw'] = $nvMdp;
            $valid = "Votre mot de passe à bien été changé.";
        }catch(PDOException $e) {
            $erreur = $e;
        }
        
    }else{
        $erreur = "Vos mots de passe ne sont pas identiques / ne correspond pas à l'ancien mot de passe.";
    }
}
if (isset($_POST['CgProfil'])){
    $nvEmail = $_POST['emailUtil'];
    $nvPrenom = $_POST['prenomUtil'];
    $nvNom = $_POST['nomUtil'];
    try{
        $idUtil = $_SESSION['idUtilisateur'];
        $bdd = getNewPDO();
        $sql = $bdd->prepare("CALL proc_update_util(:p0,:p1,:p2,:p3);");
        $sql->bindParam(":p0",$idUtil,PDO::PARAM_INT);
        $sql->bindParam(":p1",$nvPrenom,PDO::PARAM_STR,40);
        $sql->bindParam(":p2",$nvNom,PDO::PARAM_STR,40);
        $sql->bindParam(":p3",$nvEmail,PDO::PARAM_STR,250);
        $_SESSION['prenom'] = $nvPrenom;
        $_SESSION['nom'] = $nvNom;
        $_SESSION['email'] = $nvEmail;
        $sql->execute();
        header("Refresh:0");

    }catch(PDOException $e) {
        $erreur = $e;
    }
}
if (empty($_SESSION['idUtilisateur'])){?>
    <h3 class="text-center">Vous n'êtes pas connecter ou ne possedez pas de compte. <br>L'accès à cette page vous est restreint</h3>
    <p class="text-center mt-3">Connectez vous <a href="login.php">ici</a>
    <br>Créer un compte <a href="register.php">ici</a>
    <br> ou continuer votre visite <a href="index.php">ici</a></p>
<?php } else { $email =  $_SESSION['email']; $prenom = $_SESSION['prenom']; $nom = $_SESSION['nom'];?>
            <div class="container">
                    <h3 class="text-center my-5">Profil de <?php echo $_SESSION['nom']." ".$_SESSION['prenom'];?></h3>
                    <form method="POST">
                        <div class="row">
                            <div class="mb-3">
                                <label for="emailUtil" class="form-label">Adresse mail</label>
                                <input type="email" class="form-control" name="emailUtil" id="emailUtil"  value="<?php echo $email ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="nomUtil" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nomUtil" id="nomUtil"  value="<?php echo $nom ?>">
                            </div>
                            <div class="col-6">
                                <label for="prenomUtil" class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="prenomUtil" id="prenomUtil"  value="<?php echo $prenom?>">
                            </div>
                        </div>
                        <button type="submit" id="CgProfil" name="CgProfil" class="mt-3 btn btn-primary">Modifier le profil</button>
            </div>
            <hr>
            <div class="mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-4"><label for="AncienMdp" class="form-label">Entrer l'ancien mot de passe</label>
                            <input type="password" class="form-control" id="AncienMdp" name="AncienMdp">
                        </div>
                        <div class="col-4"><label for="nvMdp" class="form-label">Entrer le nouveau mot de passe</label>
                            <input type="password" class="form-control" id="nvMdp" name="nvMdp">
                        </div>
                        <div class="col-4"><label for="RnvMdp" class="form-label">Valider le nouveau mot de passe</label>
                            <input type="password" class="form-control" id="RnvMdp" name="RnvMdp">
                        </div>
                    </div> 
            <?php
                if (isset($erreur)) { ?>
                <div class="container alert alert-danger mt-3" role="alert">
                    <p class="text-danger text-center"><i class="fas fa-exclamation-triangle"></i> Erreur : <?php echo $erreur ?></p>
                </div>
            <?php
            }else if (isset($valid)){?>
                <div class="container alert alert-success mt-3" role="alert">
                    <p class="text-success text-center"><i class="fas fa-exclamation-triangle"></i> Validation : <?php echo $valid ?></p>
                </div>
            <?php }
            ?>
            <button type="submit" id="CgMdp" name="CgMdp" class=" mt-2 btn btn-primary">Changer le mot de passe</button>
                </div>
            </div>
           
        </form>

<?php include_once('footer.php');
}?>



