<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=hotel_db', 'root', '');

// Récupérer l'ID de la chambre depuis l'URL
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Requête pour obtenir les détails de la chambre
$sql = "SELECT * FROM chambres WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$chambre = $stmt->fetch();

// Si la chambre existe, afficher ses détails
if ($chambre) {
    echo "<h1>" . htmlspecialchars($chambre['name']) . "</h1>";
    echo "<p>Type : " . htmlspecialchars($chambre['type']) . "</p>";
    echo "<p>Prix : " . htmlspecialchars($chambre['price']) . "€</p>";
    echo "<p>Description : " . htmlspecialchars($chambre['description']) . "</p>";
    echo "<img src='" . htmlspecialchars($chambre['image']) . "' alt='" . htmlspecialchars($chambre['name']) . "'>";
    // Ajouter un bouton pour réserver
    echo "<button>Réserver cette chambre</button>";
} else {
    echo "<p>Cette chambre n'existe pas.</p>";
}

?>
