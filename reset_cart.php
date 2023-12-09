<?php

require('config/boot.php');

unset($_SESSION['cart']);

header('Location: index.php');

