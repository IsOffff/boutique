<?php 
require('/config/boot.php');

check_auth();

require('/templates/header.php') ?>

<div class="container">
    Bienvenue sur l'admin ! <a href="logout.php">Se déconnecter</a>
</div>

<?php require('../templates/footer.php') ?>