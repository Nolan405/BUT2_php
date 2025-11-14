<?php
include "inc/data/products.php";
$data = getProducts();

$marque = $_GET['marque'];
$produitsFiltres = [];

foreach ($data as $produit) {
    if ($produit['brand'] == $marque) {
        $produitsFiltres[] = $produit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <table border="1">
            <thead>
                <tr>
                    <th><?php echo $marque; ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    foreach($produitsFiltres as $p) {?>
                        <tr>
                            <td><a href="detail.php/?title=<?php echo urlencode($p['title']) ?>"><?php echo $p['title']; ?></a></td>
                        </tr>
                    <?php }
                    ?>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>