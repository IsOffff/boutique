<?php
    require('config/boot.php');
    require('templates/header.php');
    $connexion = connect_db();
?>
<main class="container">

    <?php
        $sql = 'SELECT * FROM products WHERE id IN (' . implode(', ', array_fill(0, count($_SESSION['cart']), '?')) . ')'; 
        $query = $connexion->prepare($sql);
        $query->execute(array_keys($_SESSION['cart']));
        $products = $query->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table class="table">
        <?php foreach($products as $product): ?>
            <tr>
                <td><?= $product['name'] ?></td>
                <td><?= $_SESSION['cart'][$product['id']] ?></td>
                <td><?= price($product['price']) ?> €</td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>Total</th>
            <th><?= array_sum($_SESSION['cart']) ?></th>
            <th><?= price(array_sum(array_map(fn ($product) => $product['price'] * $_SESSION['cart'][$product['id']], $products))) ?> €</th>
        </tr>
    </table>
</main>

<a href="identification.php" class="btn btn-success">Commander</a>

<?php require('templates/footer.php'); ?>
