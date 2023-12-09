<?php
// Vérification que les informations de commande sont présentes en session
if (!isset($_SESSION['order']) || !isset($_SESSION['cart'])) {
    header('Location: cart.php');
    exit();
}

// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=ma_base_de_donnees;charset=utf8', 'mon_nom_utilisateur', 'mon_mot_de_passe');

// Insertion de la commande dans la table "orders"
$stmt = $db->prepare('INSERT INTO orders (customer_id, billing_address_id, shipping_address_id, total_amount) VALUES (?, ?, ?, ?)');
$stmt->execute([
    $_SESSION['order']['customer_id'],
    $_SESSION['order']['billing_address_id'],
    $_SESSION['order']['shipping_address_id'],
    $_SESSION['order']['total_amount']
]);

// Récupération de l'identifiant de la commande créée
$order_id = $db->lastInsertId();

// Insertion de chaque produit du panier dans la table "order_product"
$stmt = $db->prepare('INSERT INTO order_product (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)');
foreach ($_SESSION['cart'] as $product) {
    $stmt->execute([$order_id, $product['id'], $product['quantity'], $product['price']]);
}

// Fermeture de la connexion à la base de données
$db = null;

// Suppression des informations de commande et du panier de la session
unset($_SESSION['order']);
unset($_SESSION['cart']);

// Redirection vers la page de confirmation de commande
header('Location: confirmation.php');
exit();
