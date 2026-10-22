<?php
// ---------- Lecture des paramètres de l'adresse (?view=...&q=...) ----------

$vue = $_GET['view'] ?? 'home';
if ($vue != 'home' && !isset($pages[$vue])) {
    $vue = 'home';
}

$recherche = $_GET['q'] ?? '';
$tri = $_GET['sort'] ?? 'name';
$hemisphere = $_GET['hemisphere'] ?? 'NH';
$mois_choisi = (int) ($_GET['month'] ?? date('n'));
$heure_choisie = $_GET['time'] ?? date('H:i');
$lieu = $_GET['location'] ?? '';
$categorie = $_GET['category'] ?? '';
$evenement = $_GET['event'] ?? '';
$espece = $_GET['species'] ?? '';
$page_actuelle = (int) ($_GET['page'] ?? 1);

if ($page_actuelle < 1) {
    $page_actuelle = 1;
}
if ($mois_choisi < 1 || $mois_choisi > 12) {
    $mois_choisi = (int) date('n');
}
$heure = (int) substr($heure_choisie, 0, 2); // "14:30" devient 14

$debut = ($page_actuelle - 1) * $par_page;

$est_creature = ($vue == 'fish' || $vue == 'insects' || $vue == 'sea_creatures');
