<form action="addresses_save.php" method="post">
  <label for="shipping_address">Adresse de livraison :</label>
  <select id="shipping_address" name="shipping_address">
    <?php foreach ($addresses as $address): ?>
      <option value="<?= $address['id'] ?>"><?= $address['street'] ?>, <?= $address['postal_code'] ?> <?= $address['city'] ?></option>
    <?php endforeach; ?>
  </select>
  
  <label for="billing_address">Adresse de facturation :</label>
  <select id="billing_address" name="billing_address">
    <?php foreach ($addresses as $address): ?>
      <option value="<?= $address['id'] ?>"><?= $address['street'] ?>, <?= $address['postal_code'] ?> <?= $address['city'] ?></option>
    <?php endforeach; ?>
  </select>
  
  <button type="submit">Enregistrer</button>
</form>

<a href="addresse_create.php" style="text-decoration: none; color: #0000FF;">Ajouter une nouvelle adresse</a>
