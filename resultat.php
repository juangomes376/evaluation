<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'header.php'; ?>
    
    <title>Home</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
<?php
    include('conexao.php');
    
    $typeproduit = $_POST['type'];

    if($typeproduit == "tout"){
        $requete = $conexion->prepare("SELECT * FROM produits WHERE nom LIKE ? ;");
         $requete->execute(['%'.$_POST['search'].'%']);
         $searchProduit = $requete->fetchALL();
    }else{
        $requete = $conexion->prepare("SELECT * FROM produits WHERE nom LIKE ? AND type = ?;");
        $requete->execute(['%'.$_POST['search'].'%', $_POST['type']]);
        $searchProduit = $requete->fetchALL();
    }

?>
    
<div class="resultat" >
    <ul>
    <?php
    foreach($searchProduit as $article) {
                ?>   
                    <div class="carta" >
                            <h3 class="nom"><?php  echo $article["nom"]; ?></h3>
                            <img src="<?php  echo $article["url_img"]; ?>" alt=""  >
                            <div class="">
                                <h5 class="prix"> <?php  echo $article["prix"]; ?> $</h5>
                            </div>
                    </div>
                <?php
                }
    ?>
    </ul>
</div>

<?php
    include('modal.php');
?>    
</body>
</html>