<?php
require('config/boot.php');
require('templates/header.php');

// Connexion à la base de données
$connexion = connect_db();

// Affichage des produits dans le panier
foreach ($_SESSION['cart'] as $product_id => $quantity) {
    // Récupération des informations du produit dans la base de données
    $product = getProduct($connexion, $product_id);

    // Affichage des informations du produit
    echo '<p>' . $product['name'] . ' - ' . $product['price'] . '€ x ' . $quantity . '</p>';
}

// Calcul du total
$total = 0;
foreach ($_SESSION['cart'] as $product_id => $quantity) {
    // Récupération du prix du produit dans la base de données
    $product = getProduct($connexion, $product_id);
    $price = $product['price'];

    // Calcul du sous-total pour ce produit
    $subtotal = $quantity * $price;

    // Ajout du sous-total au total
    $total += $subtotal;
}

// Affichage du total
echo '<p>Total : ' . $total . '€</p>';

// Ajout du lien Commander
echo '<a href="identification.php">Commander</a>';

require('templates/footer.php');
