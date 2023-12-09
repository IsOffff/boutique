<?php
require('config/boot.php');

// Récupération des données du formulaire
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$birthdate= $_POST['birthdate'];

$conn = connect_db();


// Vérification si l'utilisateur existe déjà
$sql = "SELECT * FROM customers WHERE email = :email";

$query = $conn->prepare($sql);
$query->execute([
    'email' => $email,
]);
$result = $query->fetch();

if (!empty($result)) {
    header('Location: identification.php');
    return;
} else {
    // Hachage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertion des données dans la base de données
    $sql = "INSERT INTO customers (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)";
    
    $query = $conn->prepare($sql);
    $query->execute([
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'password' => $password,
    ]);

    $_SESSION['email'] = $email;
    header('Location: addresses.php');
}
