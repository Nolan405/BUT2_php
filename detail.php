<?php
include "inc/data/products.php";
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
<html lang="en">
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
        <p> price : <?php echo $produit['price'] ?>$</p>
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
    </section>
</body>
</html>