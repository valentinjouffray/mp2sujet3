<?php 
include_once('header.php');
include_once('bdd_connect.php');

$id = $_GET ['id'];
    try{
        $bdd = getNewPDO();
        $sql = $bdd->prepare("CALL proc_article_detaille(:p0);");
        $sql->bindParam(":p0",$id,PDO::PARAM_INT);
        $sql->execute();
        $row_get_article = $sql->fetch(PDO::FETCH_OBJ);
    }catch(PDOException $e) {
        $erreur = $e;
    }
    if (isset($_POST['Suppr'])){
        $bdd = getNewPDO();
        $sql = $bdd->prepare("CALL  proc_delete_article(:p0);");
        $sql->bindParam(":p0",$id,PDO::PARAM_INT);
        $sql->execute();
        header('Location:article.php');
    }
    if (isset($_POST['CgProfil'])){
        $nvTitre = $_POST['titre'];
        $nvDesc = $_POST['desc'];
        $nvCorps = $_POST['corps'];
        $nvDate = $_POST['date'];
        $nvLien= $_POST['lien'];
    try{
        $bdd = getNewPDO();
        $sql = $bdd->prepare("CALL proc_update_article(:p0,:p1,:p2,:p3,:p4,:p5);");
        $sql->bindParam(":p0",$id,PDO::PARAM_INT);
        $sql->bindParam(":p1",$nvTitre,PDO::PARAM_STR,100);
        $sql->bindParam(":p2",$nvDesc,PDO::PARAM_STR,150);
        $sql->bindParam(":p3",$nvCorps,PDO::PARAM_STR,250000);
        $sql->bindParam(":p4",$nvDate,PDO::PARAM_STR);
        $sql->bindParam(":p5",$nvLien,PDO::PARAM_STR,250);
        $sql->execute();
        header("Refresh:0");
    }catch(PDOException $e) {
        $erreur = $e;
    }
    }
?>
<div class="container">
                    <h3 class="text-center my-5">Modification de l'article <?php echo $row_get_article->titre;?></h3>
                    <form method="POST">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="titre" class="form-label">titre</label>
                                <input type="text" class="form-control" name="titre" id="titre"  value="<?php echo $row_get_article->titre; ?>">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="desc" class="form-label">description</label>
                                <input type="text" class="form-control" name="desc" id="desc"  value="<?php echo $row_get_article->descArticle ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="corps" class="form-label">Corps de l'article</label>
                                <textarea type="text" rows="10" class="form-control" name="corps" id="corps"><?php echo $row_get_article->corpsArticle ?></textarea>
                            </div>
                            <div class="col-6">
                                <label for="date" class="form-label">Date Article</label>
                                <input type="date" class="form-control" name="date" id="date"  value="<?php echo $row_get_article->dateArticle?>">
                                 <br>
                                <label for="lien" class="form-label">Lien de l'image</label>
                                <input type="text" class="form-control" name="lien" id="lien"  value="<?php echo $row_get_article->img?>">
                            </div>
                        </div>
                        <button type="submit" id="CgProfil" name="CgProfil" class="mt-3 btn btn-primary">Modifier l'article</button>
                        <button type="submit" id="Suppr" name="Suppr" class="mt-3 btn btn-danger">Supprimer l'article</button>
            </div>
            <hr>



<?php include_once('footer.php');?>