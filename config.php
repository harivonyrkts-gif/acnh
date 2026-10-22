<?php
// ---------- Configuration générale du site ----------

// Les pages (catégories) du catalogue
$pages = [
    'fish' => [
        'titre' => 'Poissons',
        'icone' => 'images/fish_icone.png',
        'table' => 'fish',
    ],
    'insects' => [
        'titre' => 'Insectes',
        'icone' => 'images/insects_icone.png',
        'table' => 'insects',
    ],
    'sea_creatures' => [
        'titre' => 'Créatures marines',
        'icone' => 'images/sea_creature_icone.png',
        'table' => 'sea_creature',
    ],
    'furniture' => [
        'titre' => 'Meubles',
        'icone' => '',
        'table' => 'furniture',
    ],
    'villagers' => [
        'titre' => 'Habitants',
        'icone' => '',
        'table' => 'villagers',
    ],
];

$mois = [
    1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril',
    5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août',
    9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre',
];

// Événements proposés pour les meubles (le mot est cherché dans la colonne Season/Event)
$evenements = [
    'Birthday' => 'Anniversaire',
    'Bug-Off' => 'Concours d\'insectes',
    'Bunny Day' => 'Fête des lapins',
    'Festivale' => 'Festivale',
    'Fishing Tourney' => 'Concours de pêche',
    'Halloween' => 'Halloween',
    'New Year' => 'Nouvel An',
    'Summer' => 'Été',
    'Toy Day' => 'Fête des jouets',
    'Turkey Day' => 'Fête de la dinde',
    'Valentine' => 'Saint-Valentin',
    'Wedding Season' => 'Saison des mariages',
    'Winter' => 'Hiver',
];

// Nombre d'éléments affichés par page
$par_page = 48;
