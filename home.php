<?php
// ---------- Accueil : nombre d'éléments par catégorie ----------

foreach ($pages as $cle => $p) {
    $ligne = $pdo->query('SELECT COUNT(*) AS nb FROM ' . $p['table'])->fetch();
    $compteurs[$cle] = $ligne['nb'];
}
