<?php
include "products.php";
$data = getProducts();

$produitTitre = $_GET['title'];
$produit = null;
foreach ($data as $p) {
    if ($p['title'] == $produitTitre) {
        $produit = $p;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <section class="detail">
        <?php if ($produit) { ?>
        <h1><?php echo $produit['title'] ?></h1>
        <p> description : <?php echo $produit['description'] ?></p>
        <p> prix : <?php echo $produit['price'] ?>$</p>
        <p> stock : <?php echo $produit['stock'] ?></p>
        <?php 
        foreach($produit['images'] as $image) {?>
            <img src="<?php echo $image ?>" alt="image">
            <?php 
        }
        } else {
            echo "Produit non trouvé";
        }
        ?>
    </section>
    <section class="retour">
        <a href="../index.php?marque=<?php echo $produit['brand'] ?>">retour</a>
        <button>ajouter au panier</button>
    </section>
</body>
</html>