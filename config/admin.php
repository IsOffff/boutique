<?php

function check_auth() {
    
    // On va regarder si on a une case user dans la session

    if (!empty($_SESSION['user'])) {
        
        // On vérifie que ca correspond à un user dans la db

        $connexion = connect_db();

        $query = $connexion->prepare('SELECT * FROM users WHERE email = :email AND password = :password');

        $query->execute([
            'email' => $_SESSION['user']['email'],
            'password' => $_SESSION['user']['password'],
        ]);

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if (empty($result)) {
            header('Location: /admin/identification.php');
            return;
        }

    } else {
        // Sinon, on redirige vers login
        header('Location: /admin/identification.php');
        return;
    }
}