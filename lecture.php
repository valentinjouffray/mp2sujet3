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
    
?>
<h1 class="text-center m-5"><?php echo $row_get_article->titre?></h1>
<br>
<div class="container">
    <div class="row">
        <div class="col-8">
            <p class="fst-italic"> Ecrit le <?php echo $row_get_article->dateArticle?></p>
            <p><?php echo $row_get_article->corpsArticle?></p>
        </div>
        <div class="col-4"><img src="<?php echo $row_get_article->img ?>" alt=""></div>
    </div>
</div>
<?php include_once('footer.php')?>