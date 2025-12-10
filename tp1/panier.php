<?php
require_once "_inc/data/products.php";

session_start();

$panier = $_SESSION['panier'] ?? [];

$produitsFiltres = [];
$data = getProducts();
foreach ($data as $produit) {
    if (isset($panier[$produit['title']])) {
        $produitsFiltres[] = $produit;
    }
}

if (isset($_GET['supp'])) {
    $_SESSION = [];
    header("Location: panier.php"); 
    exit;
}

if (isset($_GET['unSupp'])) {
    unset($_SESSION['panier'][$_GET["title"]]);
    header("Location: panier.php"); 
    exit;
}

$prixTotalTousLesProduit = 0;

$codesPromo = [
    'PROMO10' => 0.10,
    'PROMO20' => 0.20
];

$codeApplique = '';
$reduction = 0;

if (isset($_POST['codePromo'])) {
    $code = strtoupper(trim($_POST['codePromo']));
    if (isset($codesPromo[$code])) {
        $codeApplique = $code;
        $reduction = $codesPromo[$code];
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Panier</title>
</head>
<body>
    <section class="block">
        <h1>Panier</h1>
        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produitsFiltres as $produit) { 
                    $titre = $produit['title'];
                    $quantite = $panier[$titre];
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($titre) ?></td>
                        <td><?php echo $quantite ?></td>
                        <?php
                        $prixTotalUnProduit = $produit['price'] * $quantite;
                        $prixTotalTousLesProduit += $prixTotalUnProduit;
                        ?>
                        <td><?php echo $prixTotalUnProduit ?>$</td>
                        <td><a href="/panier.php?unSupp=1&title=<?php echo urlencode($titre) ?>">Supp</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table class="aaaa" border="1" cellpadding="5">
            <tbody>
                <tr>
                    <td>Total : <?php echo $prixTotalTousLesProduit ?>$</td>
                </tr>
                <?php if ($reduction > 0) { ?>
                <tr>
                    <td>Réduction : -<?php echo round($prixTotalTousLesProduit * $reduction, 2) ?>$</td>
                </tr>
                <tr>
                    <td><strong>Total final : <?php echo round($prixTotalTousLesProduit * (1 - $reduction), 2) ?>$</strong></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <article>
            <p>Code Promo : </p>
            <form method="POST">
                <input type="text" name="codePromo" placeholder="...">
            </form>
            <?php if ($codeApplique) { echo "<p style='color:green;'>Code appliqué : $codeApplique</p>"; } ?>
        </article>
        <section class="retour">
            <a href="/panier.php?supp=1">Supprimer Panier</a>
            <a href="">Commander</a>
        </section>
    </section>
    <section class="panier">
        <a href="../index.php?marque=Apple">Accueil</a>
    </section>
</body>
</html>