<?php

require('config/boot.php');

$connexion = connect_db();

$query = $connexion->prepare('SELECT * FROM users WHERE email = :email AND password = :password');

$hash = my_md5($_POST['password']);

$query->execute([
    'email' => $_POST['email'],
    'password' => $hash,
]);

$result = $query->fetch(PDO::FETCH_ASSOC);

if (empty($result)) {

    // Pas le droit de se connecter
    header('Location: addresses.php?' . http_build_query([
        'error' => 'Impossible de se connecter avec ses informations de connexion',
        'email' => $_POST['email'],
    ]));
    return;

} else {
    // Bienvenue
    
    $_SESSION['user'] = $result;

    header('Location: identification.php');
}




