<?php
require('config/boot.php');

// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['user']))
{
    header('Location: identification.php');
    return;
}

// Vérifier que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] !== 'POST') 
{
    header('Location: addresse_create.php');
    return;
}

// Récupérer les données du formulaire
$street = $_POST['street'];
$postalcode = $_POST['postalcode'];
$city = $_POST['city'];
$country = $_POST['country'];
$billing = isset($_POST['billing']) && $_POST['billing'] === 'on';

// Ajouter l'adresse en base de données
$connexion = connect_db();
$query = $connexion->prepare('INSERT INTO addresses (street, postalcode, city, country, user_id, billing) VALUES (:street, :postalcode, :city, :country, :user_id, :billing)');
$query->execute([
    'street' => $street,
    'postalcode' => $postalcode,
    'city' => $city,
    'country' => $country,
    'user_id' => get_logged_in_user_id(),
    'billing' => $billing,
]);

// Rediriger vers la page de gestion des adresses
header('Location: adresses.php');
