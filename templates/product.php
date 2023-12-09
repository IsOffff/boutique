<?php if (!empty($product)): ?>
  <article class="card">
    <div class="card-header">
      <h2><?= $product['name'] ?></h2>
    </div>
    <div class="card-body">
      <p><?= $product['description'] ?></p>
    </div>
    <div class="card-footer">
      <div class="d-flex justify-content-between">
        <div>
          <form action="add_to_cart.php?id=<?= $product['id'] ?>" method="post" class="d-flex">
            <input type="number" value="1" min="1" name="qty">
            <button role="submit" class="btn btn-primary">Ajouter au panier</button>
          </form>
        </div>
        <div><?= price($product['price']) ?> €</div>
      </div>
    </div>
  </article>
<?php else: ?>
  <p>Désolé, le produit n'existe pas dans notre boutique.</p>
<?php endif; ?>