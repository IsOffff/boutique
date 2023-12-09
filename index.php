<?php 

require('config/boot.php');

require('templates/header.php');

$connexion = connect_db();
$statement = $connexion->query('SELECT * FROM products WHERE status = 1 ORDER BY price ASC');
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="container">

    <a href="cart.php">Voir le panier</a>

    <div class="row row-cols-3 g-2">
        <?php foreach ($results as $product): ?>

            <div class="col">
                
                <?php require('templates/product.php'); ?>
                
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require('templates/footer.php'); ?>