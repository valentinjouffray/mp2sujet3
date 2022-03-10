<?php 
include_once('header.php');
include_once('bdd_connect.php');


if (isset($_POST['CgProfil'])){
    $nvTitre = $_POST['titre'];
    $nvDesc = $_POST['desc'];
    $nvCorps = $_POST['corps'];
    $nvDate = $_POST['date'];
    $nvLien= $_POST['lien'];
try{
    $bdd = getNewPDO();
    $sql = $bdd->prepare("CALL  proc_add_article(:p0,:p1,:p2,:p3,:p4);");
    //$sql->bindParam(":p0",$id,PDO::PARAM_INT);
    $sql->bindParam(":p0",$nvTitre,PDO::PARAM_STR,100);
    $sql->bindParam(":p1",$nvDesc,PDO::PARAM_STR,150);
    $sql->bindParam(":p2",$nvCorps,PDO::PARAM_STR,250000);
    $sql->bindParam(":p3",$nvDate,PDO::PARAM_STR);
    $sql->bindParam(":p4",$nvLien,PDO::PARAM_STR,250);
    $sql->execute();
    header("Refresh:0");

}catch(PDOException $e) {
    $erreur = $e;
}
}?>

<div class="container">
                    <h3 class="text-center my-5">ajout de l'article </h3>
                    <form method="POST">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="titre" class="form-label">titre</label>
                                <input type="text" class="form-control" name="titre" id="titre"  value="">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="desc" class="form-label">description</label>
                                <input type="text" class="form-control" name="desc" id="desc"  value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="corps" class="form-label">Corps de l'article</label>
                                <textarea type="text" rows="10" class="form-control" name="corps" id="corps"></textarea>
                            </div>
                            <div class="col-6">
                                <label for="date" class="form-label">Date Article</label>
                                <input type="date" class="form-control" name="date" id="date"  value="">
                                 <br>
                                <label for="lien" class="form-label">Lien de l'image</label>
                                <input type="text" class="form-control" name="lien" id="lien"  value="">
                            </div>
                        </div>
                        <button type="submit" id="CgProfil" name="CgProfil" class="mt-3 btn btn-primary">Ajouter l'article</button>
            </div>
            <hr>
<?php include_once('footer.php')?>

