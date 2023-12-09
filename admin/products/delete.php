<?php

require('config/boot.php');
check_auth();

if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $connexion = connect_db();
    $query = $connexion->prepare("DELETE FROM products WHERE id = :id");

    $values = [
        'id' => $_GET['id'],
    ];

    $query->execute($values);

    header('Location: index.php');
} else {
    // Si l'identifiant est manquant ou invalide, rediriger vers la page d'index avec un message d'erreur
    $_SESSION['flash']['error'] = "L'identifiant du produit est manquant ou invalide.";
    header('Location: index.php');
    exit();
}
