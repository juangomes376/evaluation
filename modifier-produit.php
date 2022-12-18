<?php include 'header.php'; ?> 
<?php include 'navbar.php'; ?>
<h1>Modifier produit</h1>
<?php include './session/conexao.php'; ?>
<?php
//si l'utilisateur a soumis le formulaire
if (isset($_POST['nom'])) {

    //on enregistre les modifications
    $requete = $connexion->prepare(
        "UPDATE produits 
         SET nom = ?, 
             decription = ?,
             decription_en = ?,
             prix = ?,
             url_img = ?
         WHERE id = ?"
    );

    $requete->execute([
        $_POST['nom'],
        $_POST['description'],
        $_POST['descriptionEn'],
        $_POST['prix'],
        $_POST['url_image'],
        $_GET['id'],
    ]);

    //Redirection vers la page d'accueil
    header('Location: index.php');
}

$requete = $connexion->prepare('SELECT * FROM produits WHERE id = ?');

$requete->execute([$_GET['id']]);

$produit = $requete->fetch();

// echo '<pre>';
// var_dump($produit);
// echo '</pre>';
?>

    <form method="POST" class="container mb-4">
        <div class="form-group">
            <label class="col-form-label mt-4" for="inputNom">Nom</label>
            
            <input name="nom" value="<?= $produit[
                'nom'
            ] ?>" type="text" class="form-control" placeholder="Nom du produit" id="inputNom">
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label for="inputDescription" class="form-label mt-4">Description</label>
            <textarea name="description" class="form-control" id="inputDescription" rows="3"><?= $produit['decription'] ?></textarea>
            <div class="invalid-feedback">20 caractères minimum</div>
        </div>

        <div class="form-group">
            <label for="inputDescriptionen" class="form-label mt-4">Description anglais</label>
            <textarea name="descriptionEn" class="form-control" id="inputDescriptionen" rows="3"></textarea>
            <div class="invalid-feedback">20 caractères minimum</div>
        </div>

        <div class="form-group">
            <label class="col-form-label mt-4" for="inputPrix">Prix</label>
            <input name="prix"  value="<?= $produit[
                'prix'
            ] ?>"  type="number" class="form-control" placeholder="Prix du produit (ex : 5.99)" id="inputPrix">
            <div class="invalid-feedback">Le prix doit être positif</div>
       </div>

        <div class="form-group">
            <label class="col-form-label mt-4" for="inputUrlImage">URL image</label>
            <input name="url_image" value="<?= $produit[
                'url_img'
            ] ?>" type="text" class="form-control" placeholder="URL de l'image (ex: http://mon-site.com/image.jpg)" id="inputUrlImage">
            <div class="invalid-feedback"></div>
        </div>

        <input type="submit" value="Modifier l'article" class="btn btn-primary mt-4">

    </form>
</body>
</html>