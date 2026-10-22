<?php
// ---------- Meubles ----------

$requete = $pdo->query('SELECT DISTINCT category FROM furniture WHERE category IS NOT NULL ORDER BY category');
$categories = $requete->fetchAll(PDO::FETCH_COLUMN);

$conditions = '1 = 1';
$valeurs = [];

if ($recherche != '') {
    $conditions = $conditions . ' AND Name LIKE ?';
    $valeurs[] = '%' . $recherche . '%';
}
if ($categorie != '') {
    $conditions = $conditions . ' AND category = ?';
    $valeurs[] = $categorie;
}

if ($evenement != '' && isset($evenements[$evenement])) {
    $conditions = $conditions . ' AND `Season/Event` LIKE ?';
    $valeurs[] = '%' . $evenement . '%';
}

$requete = $pdo->prepare("SELECT COUNT(*) AS nb FROM furniture WHERE $conditions");
$requete->execute($valeurs);
$total = $requete->fetch()['nb'];

if ($tri == 'price_low') {
    $ordre = 'Buy IS NULL, Buy ASC, Name';
} elseif ($tri == 'price_high') {
    $ordre = 'Buy DESC, Name';
} else {
    $ordre = 'Name';
}

$requete = $pdo->prepare("SELECT Name AS nom, Buy AS prix, Filename AS image,
        category, `Season/Event` AS evenement,
        `Color 1` AS couleur1, `Color 2` AS couleur2
    FROM furniture WHERE $conditions
    ORDER BY $ordre
    LIMIT $par_page OFFSET $debut");
$requete->execute($valeurs);
$elements = $requete->fetchAll();
