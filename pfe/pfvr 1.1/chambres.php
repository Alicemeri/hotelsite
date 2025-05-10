<?php
// Liste des chambres (simulée ici, mais tu peux remplacer avec une base de données)
$chambres = [
    ['id' => 1, 'name' => 'Chambre Standard', 'type' => 'standard', 'price' => 50, 'available' => true, 'description' => 'Chambre confortable pour une personne.', 'image' => 'chambre_standard.jpg'],
    ['id' => 2, 'name' => 'Suite Luxe', 'type' => 'suite', 'price' => 150, 'available' => true, 'description' => 'Suite spacieuse avec vue sur la mer.', 'image' => 'suite_luxe.jpg'],
    ['id' => 3, 'name' => 'Chambre Deluxe', 'type' => 'deluxe', 'price' => 100, 'available' => true, 'description' => 'Chambre moderne avec balcon.', 'image' => 'chambre_deluxe.jpg'],
    ['id' => 4, 'name' => 'Chambre Familiale', 'type' => 'standard', 'price' => 75, 'available' => true, 'description' => 'Chambre familiale spacieuse pour 4 personnes.', 'image' => 'chambre_familiale.jpg'],
    ['id' => 5, 'name' => 'Chambre Simple', 'type' => 'standard', 'price' => 40, 'available' => true, 'description' => 'Chambre simple idéale pour une nuit.', 'image' => 'chambre_simple.jpg']
];

// Récupérer les critères de recherche
$search_name = isset($_GET['search_name']) ? $_GET['search_name'] : '';
$search_type = isset($_GET['search_type']) ? $_GET['search_type'] : '';
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : 9999;

// Filtrer les chambres selon les critères de recherche
$filtered_chambres = array_filter($chambres, function($chambre) use ($search_name, $search_type, $max_price) {
    return (strpos(strtolower($chambre['name']), strtolower($search_name)) !== false)
        && (empty($search_type) || $chambre['type'] === $search_type)
        && $chambre['price'] <= $max_price;
});

// Vérifier s'il y a des résultats pour la recherche
$search_results_count = count($filtered_chambres);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Chambres</title>
    <!-- Lien vers Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Nos Chambres</h1>

        <!-- Formulaire de recherche -->
        <form action="chambres.php" method="GET">
            <div class="form-group">
                <input type="text" name="search_name" class="form-control" placeholder="Nom de chambre" value="<?php echo isset($_GET['search_name']) ? $_GET['search_name'] : ''; ?>">
            </div>
            <div class="form-group">
                <select name="search_type" class="form-control">
                    <option value="">Sélectionner un type</option>
                    <option value="standard" <?php echo isset($_GET['search_type']) && $_GET['search_type'] == 'standard' ? 'selected' : ''; ?>>Standard</option>
                    <option value="suite" <?php echo isset($_GET['search_type']) && $_GET['search_type'] == 'suite' ? 'selected' : ''; ?>>Suite</option>
                    <option value="deluxe" <?php echo isset($_GET['search_type']) && $_GET['search_type'] == 'deluxe' ? 'selected' : ''; ?>>Deluxe</option>
                </select>
            </div>
            <div class="form-group">
                <input type="number" name="max_price" class="form-control" placeholder="Prix max" value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>

        <!-- Affichage des chambres filtrées -->
        <div class="mt-4">
            <?php if ($search_results_count == 0): ?>
                <p>Aucune chambre ne correspond à votre recherche.</p>
            <?php else: ?>
                <div class="row">
                    <?php foreach ($filtered_chambres as $chambre) : ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img src="images/<?php echo $chambre['image']; ?>" class="card-img-top" alt="Image de la chambre">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($chambre['name']); ?></h5>
                                    <p class="card-text">Type : <?php echo htmlspecialchars($chambre['type']); ?></p>
                                    <p class="card-text">Prix : <?php echo htmlspecialchars($chambre['price']); ?>€</p>
                                    <a href="detail_chambre.php?id=<?php echo $chambre['id']; ?>" class="btn btn-primary">Voir les détails</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Lien vers Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
