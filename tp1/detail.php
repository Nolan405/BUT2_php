<?php
require_once "_inc/data/products.php";

session_start();

$data = getProducts();

$produitTitre = $_GET['title'];
$produit = null;
foreach ($data as $p) {
    if ($p['title'] == $produitTitre) {
        $produit = $p;
    }
}

if (isset($_GET['add'])) {
    $title = $produit['title'];
    if (!isset($_SESSION['panier'][$title])) {
        $_SESSION['panier'][$title] = 1;
    } else {
        $_SESSION['panier'][$title]++;
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
    <section class="block">
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
            <a href="?title=<?php echo $produit['title'] ?>&add=1">ajouter au panier</a>
        </section>
    </section>
    <section class="panier">
        <a href="../panier.php">Accéder au panier</a>
    </section>
</body>
</html>