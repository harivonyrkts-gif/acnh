<?php
// ---------- Habitants ----------

$requete = $pdo->query('SELECT DISTINCT Species FROM villagers ORDER BY Species');
$especes = $requete->fetchAll(PDO::FETCH_COLUMN);

$conditions = '1 = 1';
$valeurs = [];

if ($recherche != '') {
    $conditions = '(Name LIKE ? OR Species LIKE ? OR Personality LIKE ? OR Hobby LIKE ?)';
    $valeurs = ['%' . $recherche . '%', '%' . $recherche . '%', '%' . $recherche . '%', '%' . $recherche . '%'];
}
if ($espece != '') {
    $conditions = $conditions . ' AND Species = ?';
    $valeurs[] = $espece;
}

$requete = $pdo->prepare("SELECT COUNT(*) AS nb FROM villagers WHERE $conditions");
$requete->execute($valeurs);
$total = $requete->fetch()['nb'];

if ($tri == 'species') {
    $ordre = 'Species, Name';
} else {
    $ordre = 'Name';
}

$requete = $pdo->prepare("SELECT Name AS nom, Species, Personality, Hobby, Birthday, Filename AS image,
    `Color 1` AS couleur1, `Color 2` AS couleur2
    FROM villagers WHERE $conditions
    ORDER BY $ordre
    LIMIT $par_page OFFSET $debut");
$requete->execute($valeurs);
$elements = $requete->fetchAll();
