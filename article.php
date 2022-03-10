<?php 
include_once('header.php');
include_once('bdd_connect.php');
    try{
        $bdd = getNewPDO();
        $sql = $bdd->prepare("CALL proc_get_article();");
        $sql->execute();
    }catch(PDOException $e) {
        $erreur = $e;
    }
    $perm = $_SESSION['perm'];
    if ($perm ==""){
        $perm = 0;
    }
?>
<div class="container mt-2 mb-2">
    <h1 class="text-center">Les dernières actualités de l'IUT</h1>
    <?php if($perm ==1){
                        ?> <br><a href="newArticle.php" class="btn btn-success mt-3 mb-2">Ajouté un article</a><?php
                    }else{
                    }?>
<?php while ($row_get_article = $sql->fetch(PDO::FETCH_OBJ)) { ?>
          <div class="row align-items-start">
            <hr>
            <h5 class="fw-bold"><?php echo  $row_get_article->titre ?></h5>
            <div class="container">
              <div class="row">
                <div class="col-6"><?php echo $row_get_article->descArticle ?><br>
                    <a href="lecture.php?id=<?php echo $row_get_article->idArticle?>" class="btn btn-success mt-3">Voir la suite de l'actualité</a>
                    <?php if($perm ==1){
                        ?> <br><a href="modifArticle.php?id=<?php echo $row_get_article->idArticle?>" class="btn btn-warning mt-3">modifié l'article</a><?php
                    }else{
                    }?>
                </div>
                <div class="col-6"><img src="<?php echo $row_get_article->img?>" alt="Université Le havre pour l'Ukraine"></div>
              </div>
            </div>
          </div>
        <?php } ?>
</div>
<br>
<?php include_once('footer.php')?>