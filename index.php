<?php
session_start();

include "products.php";
$data = getProducts();

$marque = $_GET['marque'];
$produitsFiltres = [];

foreach ($data as $produit) {
    if ($produit['brand'] == $marque) {
        $produitsFiltres[] = $produit;
    }
}

$lstMarque = [];                     
foreach($data as $produit) {
    if (!in_array($produit['brand'], $lstMarque)) {
        $lstMarque[] = $produit['brand'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tp php</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <table>
            <thead>
                <tr>
                    <th>
                        <ul>
                            <?php
                            foreach($lstMarque as $m) { ?>
                                <li>
                                    <a href="/index.php?marque=<?php echo htmlspecialchars($m) ?>"><?php echo htmlspecialchars($m) ?></a>
                                </li>
                            <?php
                            } ?>
                        </ul>
                    </th>
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
    <section class="panier">
        <a href="panier.php">Accéder au panier</a>
    </section>
</body>
</html>