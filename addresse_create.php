<?php
require('config/boot.php');

// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    $_SESSION['error'] = 'Vous devez être connecté pour ajouter une adresse';
    header('Location: identification.php');
    return;
}

// Traiter la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $postal_code = $_POST['postal_code'];
    $city = $_POST['city'];
    $street = $_POST['street'];

    // Valider les données du formulaire (exemple : vérification de champs obligatoires)
    $errors = [];
    if (empty($firstname)) {
        $errors[] = 'Le prénom est obligatoire';
    }
    // Ajouter d'autres validations si nécessaire

    // Si le formulaire est valide, enregistrer l'adresse en base de données
    if (empty($errors)) {
        $customer_id = get_logged_in_user_id();
        $connexion = connect_db();
        $query = $connexion->prepare('INSERT INTO addresses (customer_id, firstname,lastname, postal_code, city, street) VALUES (:customer_id, :firstname, :lastname, :postal_code, :city, :street)');
        $query->execute([
            'customer_id' => $customer_id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'postal_code' => $postal_code,
            'city' => $city,
            'street' => $street,
        ]);

        // Rediriger l'utilisateur vers la liste des adresses
        header('Location: addresse_store.php');
        return;
    }
}

// Afficher le formulaire
// ...
