<?php
// ---------- Point d'entrée : chef d'orchestre du site ----------

require 'database.php';   // connexion à la base ($pdo)
require 'config.php';     // pages, mois, événements, nombre par page
require 'functions.php';  // e(), lien_page(), adresse_image()
require 'params.php';     // lecture des filtres dans l'adresse

// Variables remplies par les fichiers du dossier data/
$elements = [];
$total = 0;
$lieux = [];
$categories = [];
$especes = [];
$compteurs = [];

// 1. Récupération des données selon la page demandée
if ($vue == 'home') {
    require 'data/home.php';
} elseif ($est_creature) {
    require 'data/creatures.php';
} elseif ($vue == 'furniture') {
    require 'data/furniture.php';
} else {
    require 'data/villagers.php';
}

$nombre_pages = max(1, ceil($total / $par_page));
$titre_page = ($vue == 'home') ? 'Accueil' : $pages[$vue]['titre'];

// 2. Affichage
require 'header.php';

if ($vue == 'home') {
    require 'views/home.php';
} else {
    require 'views/category.php';
}

require 'footer.php';
