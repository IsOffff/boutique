<?php
// Inclure le fichier de configuration de la base de données
require('config/config.php');

// Connexion à la base de données
$connexion = connect_db();

// Récupérer la liste des départements depuis la base de données
$departements = array();
$sql = "SELECT * FROM departements";
$result = $connexion->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $departements[] = $row;
    }
}

// Afficher la liste des départements
echo "<h1>Liste des départements :</h1>";
foreach ($departements as $departement) {
    echo "<a href='stations.php?departement_id=" . $departement["id"] . "'>" . $departement["nom"] . "</a><br>";
}

$connexion = null;
?>
