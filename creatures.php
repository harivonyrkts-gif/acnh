<?php
// ---------- Poissons, insectes et créatures marines ----------

$table = $pages[$vue]['table'];

if ($vue == 'fish') {
    $colonne_id = 'id_fish';
    $colonne_detail = 'Shadow';
} elseif ($vue == 'insects') {
    $colonne_id = 'id_insects';
    $colonne_detail = 'Weather';
} else {
    $colonne_id = 'id_sea_creature';
    $colonne_detail = 'Shadow';
}

$a_des_lieux = ($vue == 'fish' || $vue == 'insects');
if ($a_des_lieux) {
    $requete = $pdo->query("SELECT DISTINCT environment FROM place WHERE $colonne_id <> 0 ORDER BY environment");
    $lieux = $requete->fetchAll(PDO::FETCH_COLUMN);
}

$hemisphere_nombre = ($hemisphere == 'SH') ? 1 : 0;
$conditions = 'm.month = ? AND m.hemisphere = ? AND (
    m.all_day = 1
    OR (m.hour_end > m.hour_start AND ? >= m.hour_start AND ? < m.hour_end)
    OR (m.hour_end <= m.hour_start AND (? >= m.hour_start OR ? < m.hour_end))
)';
$valeurs = [$mois_choisi, $hemisphere_nombre, $heure, $heure, $heure, $heure];

if ($recherche != '') {
    $conditions = $conditions . ' AND c.Name LIKE ?';
    $valeurs[] = '%' . $recherche . '%';
}

if ($a_des_lieux) {
    $jointure_lieu = "LEFT JOIN place p ON p.$colonne_id = c.id";
    $colonne_lieu = 'p.environment AS lieu';
    if ($lieu != '') {
        $conditions = $conditions . ' AND p.environment = ?';
        $valeurs[] = $lieu;
    }
} else {
    $jointure_lieu = '';
    $colonne_lieu = "'' AS lieu";
}

$from = "FROM $table c
         JOIN moment m ON m.$colonne_id = c.id
         $jointure_lieu
         WHERE $conditions";

$requete = $pdo->prepare("SELECT COUNT(DISTINCT c.id) AS nb $from");
$requete->execute($valeurs);
$total = $requete->fetch()['nb'];

if ($tri == 'price_low') {
    $ordre = 'c.Sell ASC, c.Name';
} elseif ($tri == 'price_high') {
    $ordre = 'c.Sell DESC, c.Name';
} else {
    $ordre = 'c.Name';
}

$requete = $pdo->prepare("SELECT DISTINCT c.Name AS nom, c.Sell AS prix,
        c.`Icon Filename` AS image, c.$colonne_detail AS detail,
        c.`Spawn Rates` AS apparitions, $colonne_lieu,
        m.hour_start, m.hour_end, m.all_day
    $from
    ORDER BY $ordre
    LIMIT $par_page OFFSET $debut");
$requete->execute($valeurs);
$elements = $requete->fetchAll();
