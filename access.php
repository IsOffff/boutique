<?php
require('config/db.php');
//on va regarder si on a une classe user dans la session
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {


    $connexion = connect_db();
    $query = $connexion->prepare('SELECT * FROM users WHERE email = :email AND password = :password');


$query-> execute([
    'email'=> $_SESSION['user']['email'],
    'password'=>$_SESSION['user']['password'],
]);

$result = $query->fetch(PDO::FETCH_ASSOC);
if (empty($result)){
    header('Location:identification.php');
    return;
}

}else{
    //sinon on redirige vers login
header('Location:identification');
return;
}