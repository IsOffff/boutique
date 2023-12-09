<?php
require('config/boot.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification des champs requis
    if (!isset($_POST['firstname']) || empty($_POST['firstname'])) {
        $errors[] = "Le prénom est obligatoire";
    }
    if (!isset($_POST['lastname']) || empty($_POST['lastname'])) {
        $errors[] = "Le nom est obligatoire";
    }
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        $errors[] = "L'adresse email est obligatoire";
    }
    if (!isset($_POST['password']) || empty($_POST['password'])) {
        $errors[] = "Le mot de passe est obligatoire";
    }

    // Vérification de l'adresse email
    if (isset($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'adresse email est invalide";
    }

    if (empty($errors)) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = 'INSERT INTO customers (firstname, lastname, email, password) VALUES (?, ?, ?, ?)';
        $query = $connexion->prepare($sql);
        $query->execute([$firstname, $lastname, $email, $password]);

        $customer_id = $connexion->lastInsertId();

        $_SESSION['customer_id'] = $customer_id;

        header('Location: account.php');
        exit;
    }
}

require('templates/header.php');
?>
<main class="container">
    <h1>Créer un compte</h1>
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form method="post">
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" required>

        <label for="lastname">Nom</label>
        <input type="text" name="lastname" required>

        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>

        <button type="submit">Créer un compte</button>
    </form>
</main>
<?php require('templates/footer.php'); ?>

