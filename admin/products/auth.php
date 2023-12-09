<?php

require('config/config.php');

$connexion = connect_db();

$query = $connexion->prepare('SELECT * FROM users WHERE email = :email AND password = :password');

$hash = my_md5($_POST['password']);

$query->execute([
    'email' => $_POST['email'],
    'password' => $hash,
]);

$result = $query->fetch(PDO::FETCH_ASSOC);

if (empty($result)) {

    // pas le droit de se connecter
    header('Location: identification.php?' . http_build_query([
        'error' => 'Impossible de se connecter avec ses informations de connexion',
        'email' => $_POST['email'],
    ]));
    return;

} else {
    $_SESSION['customer'] = $result;
    header('Location: identification.php');
}


