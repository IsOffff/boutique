<?php 
require('../../config/boot.php');
check_auth();
require('../../templates/header.php') 
?>

    <main class="container">
        <form action="store.php" method="post">
            <div class="my-3">
                <label for="name" class="form-label">Nom du produit</label>
                <input class="form-control" type="text" name="name" id="name" value="<?= $_GET['name'] ?? '' ?>">
                <?php if( isset($_GET['error_name']) ): ?>
                    <div class="text-danger">
                        <?= $_GET['error_name'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="my-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description"><?= $_GET['description'] ?? '' ?></textarea>
                <?php if( isset($_GET['error_description']) ): ?>
                    <div class="text-danger">
                        <?= $_GET['error_description'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="my-3">
                <label for="price" class="form-label">Prix</label>
                <input class="form-control" type="number" name="price" id="price" value="<?= $_GET['price'] ?? '' ?>">
                <?php if( isset($_GET['error_price']) ): ?>
                    <div class="text-danger">
                        <?= $_GET['error_price'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="my-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="1" <?= ($_GET['status'] ?? '0') == '1' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="status1">Publié</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status0" value="0" <?= ($_GET['status'] ?? '0') == '0' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="status0">Non publié</label>
                </div>

                <?php if( isset($_GET['error_status']) ): ?>
                    <div class="text-danger">
                        <?= $_GET['error_status'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <button role="submit" class="btn btn-primary">Valider</button>
        </form>
    </main>

<?php require('../../templates/footer.php') ?>