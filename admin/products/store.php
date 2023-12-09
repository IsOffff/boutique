<?php

require('../../config/boot.php');
check_auth();

// ETAPE 1 : vérifier que toutes les données sont présentes et qu'elles ont le format attendue

$errors = [];

if (empty($_POST['name'])) {

    $errors['error_name'] = 'Le nom est obligatoire';
}

if (empty($_POST['description'])) {
    
    $errors['error_description'] = 'La description est obligatoire';
}

if (empty($_POST['price'])) {
    
    $errors['error_price'] = 'Le prix est obligatoire';

} elseif (! ctype_digit($_POST['price'])) {
    
    $errors['error_price'] = 'Le prix doit être un entier';
}

if (! isset($_POST['status'])) {

    $errors['error_status'] = 'Le statut est obligatoire';

} elseif ($_POST['status'] != '1' && $_POST['status'] != '0') {

    $errors['error_status'] = 'La valeur du statut est erronée';
}

if (! empty($errors)) {

    header('Location: create.php?' . http_build_query(array_merge($errors, $_POST)));
    return;
}

// ETAPE 2 : insérer les données dans la table products

$connexion = connect_db();
$query = $connexion->prepare("INSERT INTO products (name, description, price, status) VALUES (:name, :description, :price, :status)");

$values = [
    'name' => $_POST['name'],
    'description' => $_POST['description'],
    'price' => $_POST['price'],
    'status' => $_POST['status'],
];

$query->execute($values);

header('Location: index.php');
